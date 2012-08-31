<?php
class MealPlansController extends AppController {

	var $name = 'MealPlans';

	public $helpers = array('Html', 'Form', 'Filemanager', 'Text', 'Image');
	
	public $uploadsDir = 'uploads/meal_plan/';
	
	public function beforeFilter() {
        parent::beforeFilter();

        //App::import('Core', 'Folder');
        App::import('Core', 'File');
    }
    
	function admin_index() {
		$this->MealPlan->recursive = 0;
		$this->set('mealPlans', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid meal plan', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mealPlan', $this->MealPlan->read(null, $id));
	}

	function admin_add() {
		        
		if (!empty($this->data)) {
			//debug($this->data);
			
			if (isset($this->data['MealPlan']['image']['tmp_name']) &&
	            is_uploaded_file($this->data['MealPlan']['image']['tmp_name'])) {
	            $destination = $this->uploadsDir.$this->data['MealPlan']['image']['name'];
	            move_uploaded_file($this->data['MealPlan']['image']['tmp_name'], $destination);
	            //$this->Session->setFlash(__('File uploaded successfully.', true), 'default', array('class' => 'success'));
	            
	            $this->data['MealPlan']['image'] = $destination;
	        }else{
	        	$this->data['MealPlan']['image'] = '';
	        }
        
			$this->MealPlan->create();
			
			if ($this->MealPlan->save($this->data)) {
				$this->Session->setFlash(__('The meal plan has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meal plan could not be saved. Please, try again.', true));
			}
		}
		$hotels = $this->MealPlan->Hotel->find('list');
		$roomTypes = $this->MealPlan->RoomType->find('list');
		$this->set(compact('hotels', 'roomTypes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid meal plan', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//debug($this->data);
			if (isset($this->data['MealPlan']['image']['tmp_name']) &&
	            is_uploaded_file($this->data['MealPlan']['image']['tmp_name'])) {
	            $destination = $this->uploadsDir.$this->data['MealPlan']['image']['name'];
	            move_uploaded_file($this->data['MealPlan']['image']['tmp_name'], $destination);
	            //$this->Session->setFlash(__('File uploaded successfully.', true), 'default', array('class' => 'success'));
	            
	            $this->data['MealPlan']['image'] = $destination;
	        }else{
	        	$data = $this->MealPlan->read(null, $id);
	        	$this->data['MealPlan']['image'] = $data['MealPlan']['image'];
	        }
	        
			if ($this->MealPlan->save($this->data)) {
				$this->Session->setFlash(__('The meal plan has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meal plan could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MealPlan->read(null, $id);
			//debug($this->data);
		}
		$hotels = $this->MealPlan->Hotel->find('list');
		$roomTypes = $this->MealPlan->RoomType->find('list');
		$this->set(compact('hotels', 'roomTypes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for meal plan', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MealPlan->delete($id)) {
			$this->Session->setFlash(__('Meal plan deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Meal plan was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
