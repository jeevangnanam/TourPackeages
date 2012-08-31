<?php
class SearchController extends AppController {
	
	var $uses = array('Hotel','Package','RoomType','Location','MealPlan','Payments');
	
	public $helpers = array('Html', 'Form');
	
	
	public function beforeFilter() {
        parent::beforeFilter();
        //$this->Acl->allow('Search', 'Users', '*'); 
        $this->Auth->allowedActions = array('index', 'search');
    }
    
	public function index($alias = null){
		
		if (!$alias) {
            $this->redirect('/');
        }
		//debug($this->params);
		//debug($this->data);
		//$this->Search->recursive = 0;
		//$this->set('Searches', $this->paginate());
		if(!empty($this->data)){
			//debug($this->params);
			$this->set('title_for_layout', __('Search Result', true));
			$this->Hotel->recursive = 0;
			
			//$hotels = $this->Hotel->query("SELECT * FROM `hotels` WHERE `location_id` =4 AND `name` LIKE '%dubai%'");
			$this->set('hotels', $this->paginate());
		}
		
		//$gethotels = $this->Hotel->find('list');
		$locations = $this->Location->find('list');
		$mealPlans = $this->MealPlan->find('list');
		$roomTypes = $this->RoomType->find('list');
		$this->set(compact('locations', 'roomTypes', 'mealPlans', 'gethotels'));
	}
	
	public function search(){
	
		App::import('Core', 'Sanitize');
		//debug($this->params);
	}
}
?>