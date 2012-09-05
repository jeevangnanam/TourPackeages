<?php
class PackagesController extends AppController {

	var $name = 'Packages';
	
	var $components = array('Autocomplete','Image','RequestHandler');
	
	var $uses = array('Package','Coupon','Purchase','PackageGallery','Location','Hotel','Va','PurchaseVa','PackageAvailability','Api');
	
	public $helpers = array('Html', 'Form', 'Filemanager', 'Text', 'Image','Javascript', 'Ajax','DatePicker',);
	
	public $uploadsDir = 'uploads/packages/';
	
	public function beforeFilter() {
		//debug($this->params);
		//exit;		
        parent::beforeFilter();
 		App::import('Sanitize');
 		
    }

	function admin_index() {
		$this->Package->recursive = 0;
		$this->paginate = array('order'=> 'Package.created DESC',
			'limit' => 15);
		
		$this->set('packages', $this->paginate());
		//$this->Evamodel->setEntityId(8);
		//$this->Evamodel->AGE = "20";
		//$this->Evamodel->INTEREST = "Birds watching";
		//debug($this->Evamodel->STARTING_FROM);
	}

	function index() {
		//Configure::write ( 'debug', 0 );
		$this->set('title_for_layout', __('Holiday Packages', true));
		$this->Package->recursive = 0;
	        $check= $this->paginate = array(
			'conditions' => array(
	    			'Package.status' => 'APPROVED',
	    		),
	    	'joins' => array(
	          	array(
		            'table' => 'package_availabilities', 'type' => 'INNER' , 'alias' => 'PackageAvailability' , 'conditions' => array(
	                'PackageAvailability.package_id = Package.id','PackageAvailability.end_date > now()',
            	))),
            'fields' => array('PackageAvailability.start_date','PackageAvailability.end_date','Package.id','Package.name', 'Package.duration', 'Package.location_ids', 'Package.price', 'Package.package_cat_id', 'Package.hotel_ids', 'Package.room_type_id', 'Package.meal_plan_id', 'Package.max_people', 'Package.additional_person_cost', 'Package.description', 'Package.short_description', 'Package.default_map', 'Package.default_video', 'Package.terms', 'Package`.`created', 'Package.status', 'Location.id', 'Location.name', 'Location.info', 'PackageCategory.id', 'PackageCategory.name', 'Hotels.id', 'Hotels.location_id', 'Hotels.name', 'Hotels.info', 'Hotels.star_class', 'Hotels.status', 'RoomType.id', 'RoomType.hotel_id', 'RoomType.name', 'MealPlan.id', 'MealPlan.name', 'MealPlan.hotel_id', 'MealPlan.room_type_id', 'MealPlan.price', 'MealPlan.image', 'MealPlan.info', 'MealPlan.status'),
			'order'=> 'Package.created DESC',
			'limit' => 3); 
                
		$check = $this->paginate();
         
		$this->set('packages', $check);
		$packageCategories = $this->Package->PackageCategory->find('list');
		$this->set('packageCategories',$packageCategories);
        
	}
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid package', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('package', $this->Package->read(null, $id));
	}

	function view($id = null) {
		echo $this->Session->read('adults');
        
		if (!$id) {
			$this->Session->setFlash(__('Invalid package', true));
			$this->redirect(array('action' => 'index'));
		}
		$package = $this->Package->read(null, $id);
		/*$package =$this->Package->find('all', array(
	    		'conditions' => array(
	    			'Package.location_ids in (Package.location_ids)',
					'Package.id' => $id,
	    		),
	    		
	    ));*/
	    $locations = $this->Location->find('list', array(
	    		'conditions' => array(
	    			'Location.id in ('.$package['Package']['location_ids'].')',
	    		),
	    		'fields' => array('name'),
	    ));
		//$this->set('package', $package );
		$packageCategories = $this->Package->PackageCategory->find('list');
		//debug($package);
		$this->set(compact('package', 'locations','packageCategories'));
		$this->set('title_for_layout', $package['Package']['name']);
	}
	
	function admin_add() {
		//debug($this->data);
		if (!empty($this->data)) {
                         if (isset($this->data['Location'])) {
			foreach($this->data['Location'] as $key=>$location){
				$location_ids.= $location.",";
			}
                        }
			@$location_ids = substr($location_ids, 0, -1); 

			$this->data['Package']['location_ids'] = $location_ids;
			
                       if (isset($this->data['Hotel'])) {
			foreach($this->data['Hotel'] as $key2=>$hotel){
				$hotel_ids.= $hotel.",";
			}
                       }
                       
			@$this->data['Package']['hotel_ids'] = substr($hotel_ids,0,-1);

			if (isset($this->data['Package']['default_map']['tmp_name']) &&
	            is_uploaded_file($this->data['Package']['default_map']['tmp_name'])) {
	            $destination = $this->uploadsDir.$this->data['Package']['default_map']['name'];
	            move_uploaded_file($this->data['Package']['default_map']['tmp_name'], $destination);
	            //$this->Session->setFlash(__('File uploaded successfully.', true), 'default', array('class' => 'success'));
	            
	            $this->data['Package']['default_map'] = $destination;
	        }else{
	        	$this->data['Package']['default_map'] = '';
	        }
	        
			$this->Package->create();
			//debug($this->data);
			if ($this->Package->save($this->data)) {
				$this->data['PackageAvailability']['package_id'] = $this->Package->getInsertID();
				$this->PackageAvailability->create();
				$this->PackageAvailability->save($this->data);
				
				$this->saveMeta($this->Package->getInsertID(),array($this->data['meta']['meta_name'],$this->data['meta']['value']),false);
				$this->Session->setFlash(__('The package has been saved', true));
				$this->addImages($this->Package->getInsertID(),false);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package could not be saved. Please, try again.', true));
			}
		}
		$locations = $this->Location->find('list');
		$hotels = $this->Hotel->find('list');
		$roomTypes = $this->Package->RoomType->find('list');
		$mealPlans = $this->Package->MealPlan->find('list');
		$packageCategories = $this->Package->PackageCategory->find('list');
		//debug($mealPlans);
		$this->set(compact('locations', 'hotels', 'roomTypes','mealPlans','packageCategories'));
	}

	function admin_edit($id = null) {
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid package', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		
		if(!empty($this->data['Location'])){
                        foreach($this->data['Location'] as $key=>$location){
				$location_ids.= $location.",";
			}
			$location_ids = substr($location_ids, 0, -1); 

			$this->data['Package']['location_ids'] = $location_ids;
                }
                
                if(!empty($this->data['Hotel'])){
			foreach($this->data['Hotel'] as $key2=>$hotel){
				$hotel_ids.= $hotel.",";
			}
			$this->data['Package']['hotel_ids'] = substr($hotel_ids,0,-1);
                }	
			if (isset($this->data['Package']['default_map']['tmp_name']) &&
	            is_uploaded_file($this->data['Package']['default_map']['tmp_name'])) {
	            $destination = $this->uploadsDir.$this->data['Package']['default_map']['name'];
	            move_uploaded_file($this->data['Package']['default_map']['tmp_name'], $destination);
	            //$this->Session->setFlash(__('File uploaded successfully.', true), 'default', array('class' => 'success'));
	            
	            $this->data['Package']['default_map'] = $destination;
	        }else{
	        	$data = $this->Package->read(null, $id);
	        	$this->data['Package']['default_map'] = $data['Package']['default_map'];
	        }
	        //debug($data);
			if ($this->Package->save($this->data)){
				$this->data['PackageAvailability']['package_id'] = $id;
				$this->PackageAvailability->save($this->data,false);
				$this->saveMeta($id ,array($this->data['meta']['meta_name'],$this->data['meta']['value']),true);
				$this->Session->setFlash(__('The package has been saved', true));
				//debug($this->addImages($id,true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Package->read(null, $id);
			//debug($this->data);
			$getSavedLocations = $this->Location->find('list',array(
	    		'conditions' => array(
	    			'Location.id in ('.$this->data['Package']['location_ids'].')'
	    		),
	    	'fields' => array('name')
	    	));
		}
		$package_gallery_img = $this->PackageGallery->find('all',array(
			'conditions'=>array('PackageGallery.package_id in ('.$id.')'),
	    	'fields' => array('url','id')
		));
	    //debug($getSavedLocations);
		$locations = $this->Location->find('list');
		$hotels = $this->Hotel->find('list');
		$roomTypes = $this->Package->RoomType->find('list');
		$mealPlans = $this->Package->MealPlan->find('list');
		$packageCategories = $this->Package->PackageCategory->find('list');
		$this->set(compact('locations', 'hotels', 'roomTypes','mealPlans','packageCategories','getSavedLocations','package_gallery_img'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for package', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Package->delete($id)) {
			$this->Session->setFlash(__('Package deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Package was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	public function removeImg($id){
		Configure::write ( 'debug', 0 );
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for package image', true));
		}
		if ($this->PackageGallery->delete($id)) {
			$this->Session->setFlash(__('Package image deleted', true));
		}
	}
	
	public function loadLocations($location_ids = 0){
		//Configure::write ( 'debug', 0 );
		$this->set('locations', $this->Location->find('all', array(
	    		'conditions' => array(
	    			'Location.id in ('.$location_ids.')'
	    		),
	    	'fields' => array('name')
	    )));
	}
	
	public function locationRelatedHotels($location_id){
		$this->set('hotels', $this->Hotel->find('all', array(
	    		'conditions' => array(
	    			'Hotel.location_id'=>  $location_id
	    		),
	    		'fields' => array('name','id')
	    )));
	}
	
	public function hotelsInfo($hotel_ids = 0){
		
		$this->set('hotels', $this->Hotel->find('all', array(
	    		'conditions' => array(
	    			'Hotel.id in ('.$hotel_ids.')'
	    		),
	    		'fields' => array('name','info','star_class')
	    )));
	    
	    /*debug($this->Hotel->find('all', array(
	    		'conditions' => array(
	    			'Hotel.id in ('.$hotel_ids.')'
	    		),
	    		'fields' => array('name','info','star_class')
	    )));*/
	}
	
	public function search() {
		//
		//Configure::write ( 'debug', 0 );
      /* if (!isset($this->params['named']['q'])) {
          $this->redirect('/packages');
          
        }*/
      //debug($this->params);		
        App::import('Core', 'Sanitize');
	//debug($this->params['url']);
        $packageCategory = Sanitize::clean($this->params['url']['package']);      
        $arrival = Sanitize::clean($this->params['url']['arrival']);
		$departure = Sanitize::clean($this->params['url']['departure']);
		$adults = Sanitize::clean($this->params['url']['adults']);
		$children = Sanitize::clean($this->params['url']['children']);
		$hotelType = Sanitize::clean($this->params['url']['hotel_type']);
        
		
		

		//Little additional validity check on arrival date.
		
		 if(!empty($arrival)){
			 
			 $parsedArrivalDate =  date_parse($arrival);
			 $arrivalDateYear  =  $parsedArrivalDate['year'];
			 $arrivalDateMonth =  $parsedArrivalDate['month'];
			 $arrivalDateDay   =  $parsedArrivalDate['day'];
			 
			   if(!checkdate($arrivalDateMonth,$arrivalDateDay,$arrivalDateYear)){
				   die('Date format is not valid');
				   }
			 }

/*var_dump($packageCategory);
var_dump($arrival);
var_dump($departure);
var_dump($adults);
var_dump($children);
var_dump($hotelType);*/

        if(empty($packageCategory)){
        	$searchConditions = array('Package.status' => 'APPROVED');
        }else{
			$searchConditions = array('PackageCategory.id = '.$packageCategory,
									  'Package.status' => 'APPROVED' );
			}
		
        $this->paginate['Package']['order'] = 'Package.created DESC';
        $this->paginate['Package']['limit'] = 3;
        $this->paginate['Package']['conditions'] = array($searchConditions);
     
        $this->paginate['Package']['joins'] = array(
	          	array(
		            'table' => 'package_availabilities', 'type' => 'INNER' , 'alias' => 'PackageAvailability' , 'conditions' => array(
	                'PackageAvailability.package_id = Package.id',"PackageAvailability.start_date > ? " => $arrival
            	)));
        //$this->paginate['url']['city'] = "&city=".$city;
        
        $packages = $this->paginate('Package');
	//debug($packages);	
        $cat_name = $this->Package->PackageCategory->read(null, $packageCategory);
        $this->set('cat_name',$cat_name);
        $this->set('title_for_layout', sprintf(__('Search Results: %s', true), $cat_name['PackageCategory']['name']));
        $this->set(compact('packages', 'packages'));
        
        $packageCategories = $this->Package->PackageCategory->find('list');
		$this->set('packageCategories',$packageCategories);
    }
    
	public function search_api() {
		//debug($this->params);
		//Configure::write ( 'debug', 0 );
        /*if (!isset($this->params['named']['q'])) {
            //$this->redirect('/packages');
        }*/
        		
        App::import('Core', 'Sanitize');
        $q = Sanitize::clean($this->params['named']['q']);
        $city = Sanitize::clean($this->params['form']['location']);
        $duration = Sanitize::clean($this->params['named']['duration']);
        
        $amount = Sanitize::clean($this->params['named']['amount']);
		$date_range = Sanitize::clean($this->params['named']['date_range']);
		
		$amountRange = explode('-',trim($amount));
		$amount1 = str_replace('$','',$amountRange[0]);
		$amount2 = str_replace('$','',$amountRange[1]);
		
		$dateRange = explode(' to ',trim($date_range));
		$date1 = str_replace('Date(s)','',trim($dateRange[0]));
		$date2 = str_replace('Date(s)','',trim($dateRange[1]));
		$diff=(int)$date1-(int)$date2;
		
        if(empty($q)){
        	$q = 0;
        	$search_condition = array('Location.name LIKE' => '%' . $city . '%', 
        	'package.duration >= ' => abs($diff), ) ;
        }else{
        	if(!empty($diff)){
	        	$search_condition = array('PackageCategory.id = '.$q , 
	        	'Location.name LIKE' => '%' . $city . '%', 
	        	'package.duration >= ' => abs($diff), 'Package.price between ? and ?' => array($amount1,$amount2)) ;
        	}else{
        		$search_condition = array('PackageCategory.id = '.$q , 
	        	'Location.name LIKE' => '%' . $city . '%', 
	        	) ;
        	}
        }
		
        $this->paginate['Package']['order'] = 'Package.created DESC';
        $this->paginate['Package']['limit'] = 1000;
        $this->paginate['Package']['conditions'] = array(
            'Package.status' => 'APPROVED',
            'AND' => array(
                array(
                    'AND' => array($search_condition),
                ),
                /*array(
                    'OR' => array(
                        'Package.visibility_roles' => '',
                        'Package.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
                    ),
                ),*/
            ),
        );
     
        $this->paginate['Package']['joins'] = array(
	          	array(
		            'table' => 'package_availabilities', 'type' => 'INNER' , 'alias' => 'PackageAvailability' , 'conditions' => array(
	                'PackageAvailability.package_id = Package.id','PackageAvailability.end_date > now()',
            	)));
        //$this->paginate['url']['city'] = "&city=".$city;
        
        $packages = $this->paginate('Package');
		//debug($packages);
        $cat_name = $this->Package->PackageCategory->read(null, $q);
        $this->set('cat_name',$cat_name);
        $this->set('title_for_layout', sprintf(__('Search Results: %s', true), $cat_name['PackageCategory']['name']));
        $this->set(compact('packages', 'packages'));
        
        $packageCategories = $this->Package->PackageCategory->find('list');
		$this->set('packageCategories',$packageCategories);
    }
    
    function autoComplete() {
	    //Partial strings will come from the autocomplete field as
	    //$this->data['Post']['subject']
	    Configure::write ( 'debug', 0 );
	    $this->set('packages', $this->Location->find('all', array(
	    		'conditions' => array(
	    			'Location.name LIKE' => $this->data['Location']['name'].'%'
	    		),
	    	'fields' => array('name')
	    )));
	    $this->layout = 'ajax';
    }
    
    public function packageDurations(){
    	$this->set('packages', $this->Package->find('all', array(
	    		'conditions' => array(
	    			'Package.duration LIKE' => $this->data['Package']['duration'].'%'
	    		),
	    	'fields' => array('duration')
	    )));
	    $this->layout = 'ajax';
    }
    
	public function book($id = null){
		//debug($this->Auth->user());
		
		 $adults = $this->Session->read('adults');
		
		if(isset($adults) and  $adults != ''){
			
			$this->set('additionalPeople', $this->Session->read('adults'));
			}else{
				
			$this->set('additionalPeople', 'Select');	
				}
		if(empty($id)){
			$this->Session->setFlash(__('Invalid Package', true), 'default', array('class' => 'flash_error'));
			$this->redirect(array('controller'=>'packages', 'action' => 'index'));
		}
		
		$vas = $this->Va->find('all');
                
		$package = $this->Package->read(null, $id);
		if(empty($package)){
			$this->Session->setFlash(__('Package Not Found', true), 'default', array('class' => 'flash_error'));
			$this->redirect(array('controller'=>'packages', 'action' => 'index'));
		}else{
			//$this->set('package', $package);
			$hotels = $this->Hotel->find('list', array(
	    		'conditions' => array(
	    			'Hotel.id in ('.$package['Package']['hotel_ids'].')',
	    		),
	    		'fields' => array('name','star_class')
	    	));

	    	$locations = $this->Location->find('list', array(
	    		'conditions' => array(
	    			'Location.id in ('.$package['Package']['location_ids'].')'
	    		),
	    		'fields' => array('name')
	    	));
	    	
			$last_purchase_id = $this ->Session->read("LastPurchaseID");
			
			if(!empty($last_purchase_id)){
				$purchase = $this->Purchase->read(null,$this ->Session->read("LastPurchaseID"));
				//debug($purchase);
				if(empty($purchase) && $this->params['named']['step'] != ''){
					$this->Session->setFlash(__('Invalid Purchase Id', true), 'default', array('class' => 'flash_error'));
					$this->redirect(array('controller'=>'packages', 'action' => 'index'));
				}
				$this->set('purchase', $purchase);
			}else{
				if(@$this->params['named']['step'] == 2){
					if($this ->Session->read("LastPurchaseID") == ''){
						$this->Session->setFlash(__('Invalid Purchase Id', true), 'default', array('class' => 'flash_error'));
						$this->redirect(array('controller'=>'packages', 'action' => 'index'));
					}
				}
			}
			if(@$this->params['named']['step'] == 2 && !empty($this->data['Vas'])){
				//debug($this->data['Vas']);
				//$this->data['Vas']['purchase_id'] = $this ->Session->read("LastPurchaseID");
				$get_vas = $this->PurchaseVa->find('count',array(
	    			'conditions' => array(
	    			'Purchase.id' => $this ->Session->read("LastPurchaseID")
	    			),
	    			//'fields' => array('Vas.name','Vas.price')
	    		));
	    		if(empty($get_vas)){
					foreach ($this->data['Vas'] as $key=>$vas){
						$this->data['Vas']['vas_id'] = $key;
						//$this->Va->create();
						//echo $this->Va->saveAll($this->data);
						$this->saveVas($this ->Session->read("LastPurchaseID"),$this->data['Vas']['vas_id']);
					}
	    		}
				$added_service = $this->PurchaseVa->find('all',array(
			    		'conditions' => array(
			    		'Purchase.id' => $this ->Session->read("LastPurchaseID")
			    		),
			    		'fields' => array('Vas.name','Vas.price')
			    ));
			    $sum_vas_price = $this->PurchaseVa->find('first',array(
			    		'conditions' => array(
			    		'Purchase.id' => $this ->Session->read("LastPurchaseID")
			    		),
			    		'fields' => array('sum(Vas.price) as total_vas')
			    ));
			    //debug($sum_vas_price);
			}
		}
		@$this->set('sum_vas',$sum_vas_price[0]['total_vas']);
		$this->set(compact('package', 'hotels','locations','vas','added_service'));
                
              if(@$this->params['named']['step'] == 3 && @$this->params['pass'][1]){
                    $bookagain =$this->Purchase->find('first', array(
			'conditions' => array(
	    			'Purchase.id'=>$this->params['pass'][2]
	    		,), ));
                       $this->set('bookagain',$bookagain);
                // debug($bookagain);
                     

                }
              
         
	}
        
      
	public function saveVas($purchase_id,$vas_id){
		$this->Va->query("insert into purchase_vas (vas_id , 	purchase_id ) values($vas_id,$purchase_id)");
	}
	
	public function gallery($package_id = null){
		
		//$this->autoRender = false;

		//Configure::write ( 'debug', 0 );
		
		$package_gallery = $this->PackageGallery->find('all',array(
	    		'conditions' => array(
	    			'PackageGallery.package_id' => $package_id
	    		),
	    	'fields' => array('url','id')
	    ));
		//debug($package_gallery);
		
		$this->set('Package',$this->Package->read(null, $package_id));
		
		$this->set('package_gallery',$package_gallery);
		
		//$this->layout = 'ajax';
	}
	
	function saveMeta($last_id,$post,$update){
		//debug($post);
		//echo $update;
		if($update==false){
			$this->Hotel->query("insert into package_metas (package_id , meta_name , value) values($last_id,'".$post[0]."','".$post[1]."')");
		}
		if($update == TRUE){
			$this->Hotel->query("update package_metas set meta_name='".$post[0]."', value='".$post[1]."' where package_id=$last_id");
		}
	}
	
	function savePackageGallery($last_id,$post,$update){
		//debug($post);
		//echo $update;
		if($update==false){
			//$this->Hotel->query("insert into package_galleries (url , package_id) values('".$post."', $last_id)");
		}
		if($update == TRUE){
			//$this->Hotel->query("update package_galleries set url='".$post[0]."' where package_id=$last_id");
		}
		$this->Hotel->query("insert into package_galleries (url , package_id) values('".$post."', $last_id)");
	}
	
	function addImages($last_id,$update){
		//*** comments with *** added by mishu, original script by  Bogdan Lungu, www.bogdan-net.com
		if (isset($this->data['Image']['name0']['name'])) //*** verify if submit button was pressed
		{
			//debug($this->data);
		foreach($this->data['Image'] as $key => $value)
		  {
		  //echo $this->data['Image'][$key]['name'];
			if (strlen($this->data['Image'][$key]['name'])>4){
					$error = 0;
					$uploaddir1 = "uploads/packages"; // the /big/ directory /*** changed uploads directories
					$uploaddir2 = "uploads/packages/small"; // the /small/ directory with resized images /*** changed uploads directories
					$filetype = $this->Image->getFileExtension($this->data['Image'][''.$key.'']['name']);
					$filetype = strtolower($filetype);
					if (($filetype != "jpeg")  && ($filetype != "jpg"))
						   {
							// verify the extension
							$error=1;
						   }
					else
						   {
							$imgsize = GetImageSize($this->data['Image'][$key]['tmp_name']); // image size
						   }
					if (($imgsize[0]> 30000) || ($imgsize[1]> 1200)){
							 // verify to see if the image exceds 800 x 600 px
							 unlink($this->data['Image'][''.$key.'']['tmp_name']); // delete the image in case is to big //*** changed name to tmp_name to actually remove the temp image
							 //print ($this->data['Image'][''.$key.'']['name'].' -> File too big, not uploaded.<br>'); //*** added warning of file too big
							 $this->Session->setFlash(__($this->data['Image'][''.$key.'']['name'].' File too big, not uploaded.', true), 'default', array('class' => 'error'));
							 $error=1;
							}
					if ($error==0){
					 // here is generated an unic id for the image name
					 $stamp = strtotime ("now");
					 $orderid = $stamp;
					 $originalname = substr($this->data['Image'][$key]['name'], 0, -4); //*** strip extension from original filename
					 $replacespaces = str_replace (" ", "-", $originalname); //*** strip spaces from original filename
					 $orderid = str_replace(".", "", $orderid);
					 $id_unic = $replacespaces.'--'.$orderid; //*** added original filename to the file
					 $temp = $id_unic;
					 settype($temp,"string");
					 $temp.= ".";
					 $temp.= $filetype;
					 $newfile = $uploaddir1 . "/$temp";
						if (is_uploaded_file($this->data['Image'][$key]['tmp_name']))
						{
							if (!copy($this->data['Image'][$key]['tmp_name'],"$newfile"))
							{
							//print "Error Uploading File1.";
							//$this->Session->setFlash(__('Error Uploading File1.', true), 'default', array('class' => 'error'));
							exit();
							}
						}
					  $newfile2 = $uploaddir2 . "/$temp";
					  $picture_location = $newfile;
					  //$return_ar = array($newfile);
					  $size = 200; // the size for the resized image
					  $img_des = $this->Image->resize_img($picture_location, $size); //here resizing
					  imagejpeg($img_des,$newfile2,90);//*** 0-100 for image quality
					  // here you can have some code for example to insert in the database
					  // Image uploaded
					  $this->savePackageGallery($last_id,$temp,$update);
					  //return $return_ar;
					 
					  }
					  }else{
						  // Image not uploaded
						//  $this->Session->setFlash(__('Error Uploading File1.', true), 'default', array('class' => 'error'));
					  }
			 }//*** end if (strlen($this->data['Image'][$key]['name'])>4)
		  
		
		  }//*** end foreach
	
	 }//*** end isset($this->data)

}
