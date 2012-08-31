<?php
class PurchasesController extends AppController {

	var $name = 'Purchases';
	var $uses = array('Purchase','Location','Hotel','PurchaseVa','Payment');
	public $helpers = array('Csv');
	
	public $components = array('Pdfview.PdfLayout' => array('debug' => 0, 'method' => 'wkhtmltopdf', 'serve' => true,  'dumphtml' => true, ),  );
    
	function admin_index() {
		$this->Purchase->recursive = 0;
                $this->paginate = array(
                    'order' => 'Purchase.date DESC',
                     'limit' => 20);
                $this->set('purchases', $this->paginate());
	}

	function admin_viewpdf($id = null)
    {
        //Configure::write('debug',0); // Otherwise we cannot use this method while developing 
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		$purchase = $this->Purchase->read(null, $id);
		$locations = $this->Location->find('list', array(
	    		'conditions' => array(
	    			'Location.id in ('.$purchase['Package']['location_ids'].')',
	    		),
	    		'fields' => array('name'),
	    ));
	    $hotels = $this->Hotel->find('list', array(
	    		'conditions' => array(
	    			'Hotel.id in ('.$purchase['Package']['hotel_ids'].')',
	    		),
	    		'fields' => array('name'),
	    ));
	    $added_services = $this->PurchaseVa->find('all',array(
			    		'conditions' => array(
			    		'Purchase.id' => $id
			    		),
			    		'fields' => array('Vas.name','Vas.price')
			    ));
		//debug($purchase);
		$this->set(compact('purchase','locations','hotels','added_services' ));
		
        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
    }
    
	function admin_export(){
        	App::import('Helper','csv');
			$csv = new csvHelper();
            // Stop Cake from displaying action's execution time 
            //Configure::write('debug',0); 
            $condition = array(
            				'MONTH(Purchase.date)' => $this->data['Purchase']['mob']['month'],
            				//'Purchase.status' => 'APPROVED'
            );
            $data = $this->Purchase->find( 'all', array(
            	'conditions' => $condition,
	    		'joins' => array(
	          	array(
		            'table' => 'payments', 'type' => 'INNER' , 'alias' => 'Payment' , 'conditions' => array(
	                'Purchase.id = Payment.purchase_id','Payment.is_authorized' => 'AUTHORIZED',
            	))),
                array(
                    'fields' => array('Purchase.id','Purchase.date','Package.name','Payment.total_amount'), 
                    'order' => "Order.id ASC", 
                    'contain' => false 
            ))); 
            //debug($data);
			$line = array('ID', 'Date', 'User', 'Package', 'Cuopon ID', 'Cuopon %', 'Status'); 
			$csv->addRow($line); 
			
            foreach ($data as $key=>$value){
            	$line = array($value['Purchase']['id'], $value['Purchase']['date'], 
            	$value['User']['name'], $value['Package']['name'], $value['Coupon']['id'], $value['Coupon']['reduce_percentage'], $value['Purchase']['status']); 
				$csv->addRow($line); 
            }

            $this->layout = 'empty';
            $render = 'Purchases'.date('Y').$this->data['Purchase']['mob']['month'].'.csv';
			echo $csv->render($render);
            //$this->set(compact('data')); 
   }
   
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('purchase', $this->Purchase->read(null, $id));
	}
	
	function admin_viewInvoice($id = null) {
		//Configure::write ( 'debug', 0 );
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		$purchase = $this->Purchase->read(null, $id);
		$locations = $this->Location->find('list', array(
	    		'conditions' => array(
	    			'Location.id in ('.$purchase['Package']['location_ids'].')',
	    		),
	    		'fields' => array('name'),
	    ));
	    $hotels = $this->Hotel->find('list', array(
	    		'conditions' => array(
	    			'Hotel.id in ('.$purchase['Package']['hotel_ids'].')',
	    		),
	    		'fields' => array('name'),
	    ));
	    $added_services = $this->PurchaseVa->find('all',array(
			    		'conditions' => array(
			    		'Purchase.id' => $id
			    		),
			    		'fields' => array('Vas.name','Vas.price')
			    ));
		//debug($purchase);
		$this->set(compact('purchase','locations','hotels','added_services' ));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Purchase->create();
			if ($this->Purchase->save($this->data)) {
				$this->Session->setFlash(__('The purchase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Purchase->User->find('list');
		$packages = $this->Purchase->Package->find('list');
		$hotels = $this->Purchase->Hotel->find('list');
		$coupons = $this->Purchase->Coupon->find('list',array('fields'=>'coupon'));
		$this->set(compact('users', 'packages', 'hotels', 'coupons'));
	}

	function admin_edit($id = null){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Purchase->save($this->data)) {
				$this->Session->setFlash(__('The purchase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Purchase->read(null, $id);
		}
		$users = $this->Purchase->User->find('list');
		$packages = $this->Purchase->Package->find('list');
		$hotels = $this->Hotel->find('list');
		$coupons = $this->Purchase->Coupon->find('list');
		$this->set(compact('users', 'packages', 'hotels', 'coupons'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Purchase->delete($id)) {
			$this->Session->setFlash(__('Purchase deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	public function my_purchases(){
		$user_purchase = $this->Purchase->find('all',array(
	    		'conditions' => array(
	    			'Purchase.user_id' => $this->Auth->user('id')
	    		),
	    	/*'fields' => array('url','id')*/
	    ));
	  	
	} 
}
