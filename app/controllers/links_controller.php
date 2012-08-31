<?php
/**
 * Links Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class LinksController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Links';
/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
    public $uses = array('Link','Role','Purchase','Package','Location','Payment');
/**
 * Menu ID
 *
 * holds the current menu ID (if any)
 *
 * @var string
 * @access public
 */
    public $menuId = '';
    
    var $components = array('Autocomplete','Image','RequestHandler');
    
    public $helpers = array('Html', 'Form', 'Filemanager', 'Text', 'Image','Javascript', 'Ajax','DatePicker','Custom');
    
    public $uploadsDir = 'uploads/packages/';
    
	public function index(){
      /*    debug($_POST);
        if(!empty($_POST)){

        $pg_datails = $_POST;
        $total_amount = $pg_datails['amount'];
        $merchant_reference= $pg_datails['merchant_reference_no'];
        $pgstatus=$pg_datails['status'];
        
        $transactionTypeCode=$pg_datails ["transaction_type_code"];
        $installments=$pg_datails ["installments"];
        $transactionId=$pg_datails["transaction_id"];
        $exponent=$pg_datails["exponent"];
        $currencyCode=$pg_datails ["currency_code"];
        $merchantReferenceNo=$pg_datails ["merchant_reference_no"];
        $status=$pg_datails["status"];
        @$eci=$pg_datails["3ds_eci"];
        $pgErrorCode=$pg_datails["pg_error_code"];
        $messageHash=$pg_datails["message_hash"].'</br>';
       
        $pgdomain='www.paystage.com';
        $pgInstanceId='73787690';
        $merchantId='59485196';
        $hashKey='05190B07908C1E96';
        $messageHashBuf=$pgInstanceId."|".$merchantId."|".$transactionTypeCode."|".$installments."|".$transactionId."|".$total_amount."|".$exponent."|".$currencyCode."|".$merchant_reference."|".$pgstatus."|".$eci."|".$pgErrorCode."|".$hashKey."|";

       $messageHashClient = "13:".base64_encode(sha1($messageHashBuf, true));
       $check_validity =  $this->Payment->find('first', array(
            'conditions' => array( 'merchant_reference' =>$merchant_reference  ),
            'order' => array('Payment.id DESC'),));
        //debug($check_validity);
        $merchant_client=$check_validity['Payment']['message_hash'];
        
        if($pgstatus =='50020' && $messageHash=$messageHashClient){
           $this->Payment->read(null,$check_validity ['Payment']['id'] );
           $this->Payment->set('status', 'APPROVED');
           $this->Payment->save();
           $this->Session->setFlash(__('Your transcation is completed.', true));
         }
         else {
           $this->Session->setFlash(__('Your transcation is fails.', true));
           //$this->redirect('http://lifelh.loooops.com/packages/');
        }

        } 
        */
    	$packageCategories = $this->Package->PackageCategory->find('list');
    	$userRemarks = $this->Purchase->find('all',array(
    				'conditions' => array(
	    			'Purchase.status' => 'APPROVED',
		    		),
		    		'fields' => array('Purchase.user_remarks','Package.name','Package.id'),
		    		'order' => 'RAND()','limit' => 1)
    					
    	);
    	
    	$packageImages = $this->Package->find('all',array(
    				'conditions' => array(
	    			'Package.status' => 'APPROVED',
		    		),
		    		'fields' => array('Package.name','Package.default_map','Package.id'),
		    		'order' => 'RAND()','limit' => 30
		    		)
    	);
    	
    	$lastPackages = $this->Package->find('all',array(
    				'conditions' => array(
	    			'Package.status' => 'APPROVED',
		    		),
		    		'fields' => array('Package.name','Package.default_map','Package.id','Package.price','Package.short_description'),
		    		'order' => array('Package.id DESC'),'limit' => 10
		    		)
    	);
    	
    	$destinations = $this->Location->find('all',array(
    				/*'conditions' => array(
	    			'Location.status' => 'APPROVED',
		    		),*/
		    		'fields' => array('Location.name','Location.info','Location.id'),
		    		'order' => array('Location.id DESC'),'limit' => 8
		    		)
    	);
    	
    	//debug($packageImages);
    	$this->set(compact('packageCategories','userRemarks','packageImages','lastPackages','destinations'));
    	//debug($userRemarks);
    	$this->set('title_for_layout', __('Welcome', true));
    }
    
	public function admin_index($menuId = null) {
        if (!$menuId) {
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $menu = $this->Link->Menu->findById($menuId);
        if (!isset($menu['Menu']['id'])) {
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->set('title_for_layout', sprintf(__('Links: %s', true), $menu['Menu']['title']));

        $this->Link->recursive = 0;
        $linksTree = $this->Link->generatetreelist(array(
            'Link.menu_id' => $menuId,
        ));
        $linksStatus = $this->Link->find('list', array(
            'conditions' => array(
                'Link.menu_id' => $menuId,
            ),
            'fields' => array(
                'Link.id',
                'Link.status',
            ),
        ));
        $this->set(compact('linksTree', 'linksStatus', 'menu'));
    }

    public function admin_add($menuId = null) {
        $this->set('title_for_layout', __('Add Link', true));

        if (!empty($this->data)) {
            $this->Link->create();
            $this->data['Link']['visibility_roles'] = $this->Link->encodeData($this->data['Role']['Role']);
            $this->Link->Behaviors->attach('Tree', array(
                'scope' => array(
                    'Link.menu_id' => $this->data['Link']['menu_id'],
                ),
            ));
            if ($this->Link->save($this->data)) {
                $this->Session->setFlash(__('The Link has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action'=>'index', $this->data['Link']['menu_id']));
            } else {
                $this->Session->setFlash(__('The Link could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        $menus = $this->Link->Menu->find('list');
        $roles = $this->Role->find('list');
        $parentLinks = $this->Link->generatetreelist(array(
            'Link.menu_id' => $menuId,
        ));
        $this->set(compact('menus', 'roles', 'parentLinks', 'menuId'));
    }

    public function admin_edit($id = null) {
        $this->set('title_for_layout', __('Edit Link', true));

        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Link', true), 'default', array('class' => 'error'));
            $this->redirect(array(
                'controller' => 'menus',
                'action'=>'index',
            ));
        }
        if (!empty($this->data)) {
            $this->data['Link']['visibility_roles'] = $this->Link->encodeData($this->data['Role']['Role']);
            $this->Link->Behaviors->attach('Tree', array(
                'scope' => array(
                    'Link.menu_id' => $this->data['Link']['menu_id'],
                ),
            ));
            if ($this->Link->save($this->data)) {
                $this->Session->setFlash(__('The Link has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action'=>'index', $this->data['Link']['menu_id']));
            } else {
                $this->Session->setFlash(__('The Link could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $data = $this->Link->read(null, $id);
            $data['Role']['Role'] = $this->Link->decodeData($data['Link']['visibility_roles']);
            $this->data = $data;
        }
        $menus = $this->Link->Menu->find('list');
        $roles = $this->Role->find('list');
        $menu = $this->Link->Menu->findById($this->data['Link']['menu_id']);
        $parentLinks = $this->Link->generatetreelist(array(
            'Link.menu_id' => $menu['Menu']['id'],
        ));
        $menuId = $menu['Menu']['id'];
        $this->set(compact('menus', 'roles', 'parentLinks', 'menuId'));
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Link', true), 'default', array('class' => 'error'));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $link = $this->Link->findById($id);
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash(__('Invalid id for Link', true), 'default', array('class' => 'error'));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        if (!isset($this->params['named']['token']) || ($this->params['named']['token'] != $this->params['_Token']['key'])) {
            $blackHoleCallback = $this->Security->blackHoleCallback;
            $this->$blackHoleCallback();
        }
        $this->Link->Behaviors->attach('Tree', array(
            'scope' => array(
                'Link.menu_id' => $link['Link']['menu_id'],
            ),
        ));
        if ($this->Link->delete($id)) {
            $this->Session->setFlash(__('Link deleted', true), 'default', array('class' => 'success'));
            $this->redirect(array(
                'action'=>'index',
                $link['Link']['menu_id'],
            ));
        }
    }

    public function admin_moveup($id, $step = 1) {
        $link = $this->Link->findById($id);
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash(__('Invalid id for Link', true), 'default', array('class' => 'error'));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->Link->Behaviors->attach('Tree', array(
            'scope' => array(
                'Link.menu_id' => $link['Link']['menu_id'],
            ),
        ));
        if( $this->Link->moveup($id, $step) ) {
            $this->Session->setFlash(__('Moved up successfully', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move up', true), 'default', array('class' => 'error'));
        }
        $this->redirect(array(
            'action' => 'index',
            $link['Link']['menu_id'],
        ));
    }

    public function admin_movedown($id, $step = 1) {
        $link = $this->Link->findById($id);
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash(__('Invalid id for Link', true), 'default', array('class' => 'error'));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->Link->Behaviors->attach('Tree', array(
            'scope' => array(
                'Link.menu_id' => $link['Link']['menu_id'],
            ),
        ));
        if( $this->Link->movedown($id, $step) ) {
            $this->Session->setFlash(__('Moved down successfully', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move down', true), 'default', array('class' => 'error'));
        }
        $this->redirect(array(
            'action' => 'index',
            $link['Link']['menu_id'],
        ));
    }

    public function admin_process($menuId = null) {
        $action = $this->data['Link']['action'];
        $ids = array();
        foreach ($this->data['Link'] AS $id => $value) {
            if ($id != 'action' && $value['id'] == 1) {
                $ids[] = $id;
            }
        }
        if (count($ids) == 0 || $action == null) {
            $this->Session->setFlash(__('No items selected.', true), 'default', array('class' => 'error'));
            $this->redirect(array(
                'action' => 'index',
                $menuId,
            ));
        }
        $menu = $this->Link->Menu->findById($menuId);
        if (!isset($menu['Menu']['id'])) {
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->Link->Behaviors->attach('Tree', array(
            'scope' => array(
                'Link.menu_id' => $menuId,
            ),
        ));

        if ($action == 'delete' &&
            $this->Link->deleteAll(array('Link.id' => $ids), true, true)) {
            $this->Session->setFlash(__('Links deleted.', true), 'default', array('class' => 'success'));
        } elseif ($action == 'publish' &&
            $this->Link->updateAll(array('Link.status' => 1), array('Link.id' => $ids))) {
            $this->Session->setFlash(__('Links published', true), 'default', array('class' => 'success'));
        } elseif ($action == 'unpublish' &&
            $this->Link->updateAll(array('Link.status' => 0), array('Link.id' => $ids))) {
            $this->Session->setFlash(__('Links unpublished', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('An error occurred.', true), 'default', array('class' => 'error'));
        }

        $this->redirect(array(
            'action' => 'index',
            $menuId,
        ));
    }
}
?>