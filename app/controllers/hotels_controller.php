<?php
class HotelsController extends AppController {

	var $name = 'Hotels';

	public $components = array('Recaptcha', );
	
	public $helpers = array('Html', 'Form', 'Filemanager', 'Text', 'Image','Custom');
	
    public $uses = array(  'Hotel' );
    
    public $uploadsDir = 'uploads/hotels/';
    
	public function beforeFilter() {
        parent::beforeFilter();

        if (isset($this->params['slug'])) {
            $this->params['named']['slug'] = $this->params['slug'];
        }
        if (isset($this->params['type'])) {
            $this->params['named']['type'] = $this->params['type'];
        }

        // CSRF Protection
        if (in_array($this->params['action'], array('admin_add', 'admin_edit'))) {
            $this->Security->validatePost = false;
        }
    }
    
	function admin_index() {
		$this->set('title_for_layout', __('Hotels', true));
		$this->Hotel->recursive = 0;
		$this->set('hotels', $this->paginate());
	}

	function index() {
		$this->set('title_for_layout', __('Hotels', true));
		$this->Hotel->recursive = 0;
		$this->paginate = array(
		'limit' => 5);
		$this->set('hotels', $this->paginate());
	}
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid hotel', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('hotel', $this->Hotel->read(null, $id));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid hotel', true));
			$this->redirect(array('action' => 'index'));
		}
		//$roomTypes = $this->Hotel->RoomType->find('list',array('conditions' => array("hotel_id = $id ")));
		//$mealPlans = $this->Hotel->MealPlan->find('list',array('conditions' => array("hotel_id = $id ")));
		//$this->set(compact('roomTypes','mealPlans'));
		$hotel = $this->Hotel->read(null, $id);
		$this->set('hotel', $hotel);
		
		$this->set('title_for_layout', sprintf(__('Hotel: %s', true), $hotel['Hotel']['name']));
	}
	
	function admin_add() {
		//debug($this->params);
		$this->set('title_for_layout', __('Add Hotels', true));
		//debug($this->data);
		if (!empty($this->data)) {
			$this->Hotel->create();
			if (isset($this->data['Hotel']['image']['tmp_name']) &&
	            is_uploaded_file($this->data['Hotel']['image']['tmp_name'])) {
	            $destination = $this->uploadsDir.$this->data['Hotel']['image']['name'];
	            move_uploaded_file($this->data['Hotel']['image']['tmp_name'], $destination);
	            //$this->Session->setFlash(__('File uploaded successfully.', true), 'default', array('class' => 'success'));
	            
	            $this->data['Hotel']['image'] = $destination;
	        }else{
	        	$this->data['Hotel']['image'] = '';
	        }
	       // debug($this->data);
			if ($this->Hotel->save($this->data)) {
				//echo $this->Hotel->getInsertID();
				$this->saveMeta($this->Hotel->getInsertID(),array($this->data['meta']['meta_name'],$this->data['meta']['value']),false);
				$this->Session->setFlash(__('The hotel has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hotel could not be saved. Please, try again.', true));
			}
		}
		$locations = $this->Hotel->Location->find('list');
		$this->set(compact('locations'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid hotel', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if (isset($this->data['Hotel']['image']['tmp_name']) &&
	            is_uploaded_file($this->data['Hotel']['image']['tmp_name'])) {
	            $destination = $this->uploadsDir.$this->data['Hotel']['image']['name'];
	            move_uploaded_file($this->data['Hotel']['image']['tmp_name'], $destination);
	            //$this->Session->setFlash(__('File uploaded successfully.', true), 'default', array('class' => 'success'));
	            
	            $this->data['Hotel']['image'] = $destination;
	        }else{
	        	$this->data['Hotel']['image'] = '';
	        }
	       // debug($this->data);
	        exit();
			if ($this->Hotel->save($this->data)) {
				$this->saveMeta($id,array($this->data['meta']['meta_name'],$this->data['meta']['value']), true);
				
				$this->Session->setFlash(__('The hotel has been saved', true));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hotel could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Hotel->read(null, $id);
			//debug($this->data);
		}
		$locations = $this->Hotel->Location->find('list');
		$this->set(compact('locations'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for hotel', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Hotel->delete($id)) {
			$this->Session->setFlash(__('Hotel deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Hotel was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function saveMeta($last_id,$post,$update){
		//debug($post);
		//echo $update;
		if($update==false){
			$this->Hotel->query("insert into hotel_metas (hotel_id,meta_name , value) values($last_id,'".$post[0]."','".$post[1]."')");
		}
		if($update == TRUE){
			$this->Hotel->query("update hotel_metas set meta_name='".$post[0]."', value='".$post[1]."' where hotel_id=$last_id");
		}
	}
	
}
