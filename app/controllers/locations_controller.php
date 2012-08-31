<?php
class LocationsController extends AppController {

	var $name = 'Locations';
	
	var $components = array('Autocomplete');
	
	public $helpers = array('Html', 'Form', 'Filemanager', 'Text', 'Image','Javascript', 'Ajax');
        
        var $uses = array('Location','Package');
	
	function autoComplete() {
	    //Partial strings will come from the autocomplete field as
	    //debug($this->params);
            $this->layout = 'ajax';
	    $this->set('locations', $this->Location->find('all', array(
	    		'conditions' => array(
	    			'Location.name LIKE' => '%'.$this->params['url']['q'].'%'
	    		),
	    	'fields' => array('name')
	    )));
	    
    }
    
	function admin_index() {
		$this->Location->recursive = 0;
		$this->set('locations', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('location', $this->Location->read(null, $id));
	}
	
	function view($id = null) {
            
           $location=$this->params;
           $location_id=$location['pass'][0];
          
		if (!$id) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
            /*   $packeges= $this->Package->find('all', array(
               'conditions'=> array('location_ids' => $location_id,'Package.status ='=>'APPROVED')) );  */
                
                $packeges = $this->Package->find('all', array('joins' => array(
                    array(
                        'table' => 'package_availabilities',
                        'alias' => 'packageAvailabilities',
                        'type' => 'inner',
                        'foreignKey' => false,
                        'conditions'=> array('Package.id = packageAvailabilities.package_id','packageAvailabilities.end_date > now()')
                    ),
                    array(
                        'table' => 'locations',
                        'alias' => 'Locations',
                        'type' => 'inner',
                        'foreignKey' => false,
                        'conditions'=> array('Locations.id = Package.location_ids',
                            'Locations.id '=>$location_id
                        )
                    )
                  )));  
                $this->set('packeges',$packeges);
		$this->set('location', $this->Location->read(null, $id));
		$this->layout = 'ajax';
               
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Location->create();
			if ($this->Location->save($this->data)) {
				$this->saveMeta($this->Location->getInsertID(),array($this->data['meta']['meta_name'],$this->data['meta']['value']),false);
				$this->Session->setFlash(__('The location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Location->save($this->data)) {
				$this->saveMeta($id ,array($this->data['meta']['meta_name'],$this->data['meta']['value']),true);
				$this->Session->setFlash(__('The location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Location->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for location', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Location->delete($id)) {
			$this->Session->setFlash(__('Location deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Location was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function saveMeta($last_id,$post,$update){
		//debug($post);
		//echo $update;
		if($update==false){
			$this->Hotel->query("insert into location_metas (location_id , meta_name , value) values($last_id,'".$post[0]."','".$post[1]."')");
		}
		if($update == TRUE){
			$this->Hotel->query("update location_metas set meta_name='".$post[0]."', value='".$post[1]."' where location_metas=$last_id");
		}
	}
}
