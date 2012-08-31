<?php
class CouponsController extends AppController {

	var $name = 'Coupons';
	var $uses = array('Coupon','Package','Purchase');
	
	function couponCheck(){
		if($this->data['Coupon']['additional_persons'] == ''){
			$this->data['Coupon']['additional_persons'] = 0;
		}
		//debug($this -> Session -> read());
    	//debug($this->params);    	
    	if (!isset($this->params['pass'][0])) {
            $this->redirect('/packages');
        }else{
        	if(isset($this->data['Coupon']['coupon'])){
        		//check coupon table
        		$conditions = array('Coupon.coupon' => ''.$this->data['Coupon']['coupon'].'');
        		
        		$coupon = $this->Coupon->find('first', array('fields' => array('Coupon.coupon', 'Coupon.reduce_percentage','Coupon.id'),
        			'conditions' => $conditions
        			));
        		//$coupon = $this->Coupon->query("select id,coupon,reduce_percentage from coupons where coupon='".$this->data['Coupon']['coupon']."'");
        		
        		//debug($coupon);
        		if (!empty($coupon)) {
					$this->Session->setFlash(__('Coupon Founded', true), 'default', array('class' => 'flash_success'));
					$package = $this->Package->read(null, $this->params['pass'][0]);
					$this->set('package', $package);
					$package_reduce_price = $package['Package']['price'] ;
					$package_reduce_price = ($package_reduce_price)-($package_reduce_price)*($coupon['Coupon']['reduce_percentage'] /100);
					//echo $package_reduce_price;
					
					$this->data['Purchase']['date'] = date('Y-m-d H:i:s');
					$this->data['Purchase']['user_id'] = $this->Auth->user('id');
					$this->data['Purchase']['package_id'] = $package['Package']['id'];
					$this->data['Purchase']['hotel_ids'] = $package['Package']['hotel_ids'];
					$this->data['Purchase']['order_processed_by'] = $this->Auth->user('id');
					$this->data['Purchase']['order_approved_by'] = 1;
					$this->data['Purchase']['coupon_id'] = $coupon['Coupon']['id'];
					$this->data['Purchase']['additional_persons'] = $this->data['Coupon']['additional_persons'];
					
					$this->Purchase->create();
					if($this->Purchase->save($this->data)){
						$this ->Session ->write('LastPurchaseID', $this->Purchase->getInsertID());
						$this->redirect(array('controller'=>'packages', 'action' => 'book/'.$this->params['pass'][0],'step'=>'2'));
					}else{
						$this->Session->setFlash(__('Some Error Occurred', true), 'default', array('class' => 'flash_error'));
					}
					
				}else{
					if($this->data['Coupon']['coupon'] != ''){
						$this->Session->setFlash(__('Invalid Coupon', true), 'default', array('class' => 'flash_error'));
						$this->redirect(array('controller'=>'packages', 'action' => 'book/'.$this->params['pass'][0]/*,'step'=>'2'*/));
					}else{
						$package = $this->Package->read(null, $this->params['pass'][0]);
						$this->set('package', $package);
						$this->data['Purchase']['date'] = date('Y-m-d H:i:s');
						$this->data['Purchase']['user_id'] = $this->Auth->user('id');
						$this->data['Purchase']['package_id'] = $package['Package']['id'];
						$this->data['Purchase']['hotel_ids'] = $package['Package']['hotel_ids'];
						$this->data['Purchase']['order_processed_by'] = $this->Auth->user('id');
						$this->data['Purchase']['order_approved_by'] = 1;
						$this->data['Purchase']['coupon_id'] = 0;
						$this->data['Purchase']['additional_persons'] = $this->data['Coupon']['additional_persons'];
						
						$this->Purchase->create();
						if($this->Purchase->save($this->data)){
							$this ->Session->write('LastPurchaseID', $this->Purchase->getInsertID());
							$this->redirect(array('controller'=>'packages', 'action' => 'book/'.$this->params['pass'][0],'step'=>'2'));
						}else{
							$this->Session->setFlash(__('Some Error Occurred', true), 'default', array('class' => 'flash_error'));
						}
						//$this->redirect(array('controller'=>'packages', 'action' => 'book/'.$this->params['pass'][0],'step'=>'2'));
					}
				}
				
        	}else{
        		//
        		$this->redirect('/packages');
        	}
        }
    	
    }
    
	function admin_index() {
		$this->Coupon->recursive = 0;
		$this->set('coupons', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid coupon', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('coupon', $this->Coupon->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Coupon->create();
			if ($this->Coupon->save($this->data)) {
				$this->Session->setFlash(__('The coupon has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coupon could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid coupon', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Coupon->save($this->data)) {
				$this->Session->setFlash(__('The coupon has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coupon could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Coupon->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for coupon', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Coupon->delete($id)) {
			$this->Session->setFlash(__('Coupon deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Coupon was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
