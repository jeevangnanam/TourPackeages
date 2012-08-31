<?php
class PaymentsController extends AppController {

	var $name = 'Payments';
        var $actsAs = array ('Searchable');
        var $components = array('PaginateFormVariables','Autocomplete','Image','RequestHandler','Email');
        var $uses = array('Payment','Link','Package','Link','Role','Purchase','Location','Payment','Purcharses_meta');
        public $helpers = array('Html', 'Form', 'Filemanager', 'Text', 'Image','Javascript', 'Ajax','DatePicker','Custom');

	function admin_index($date=NULL) {
                $date=@$this->data['Payment']['search'];
                $this->Payment->recursive = 0;
                if($date <> ""){
                       $cond = array("date(Payment.created)" => $date); 
                       $this->set('payments', $this->paginate('Payment',$cond));
                }
                else {
                    $this->set('payments', $this->paginate());
                }
             
                $results=$this->Payment->find('list', array('fields' => 'Payment.created'));
                $results_user = $this->Payment->find('all',array('table' => 'payment',
                'alias' => 'payments',
                'type' => 'inner',
                'conditions' => array(
                'Payment.user_id= User.id' ),
                'fields' => array('Payment.user_id', 'User.name'),
    ));
                $this->set('search_date', $results);
                $this->set('users', $results_user);
	}

       
    function add(){
      //debug( $this->data);
        
                if(!empty($this->data)){
                $this->layout = 'add'; 
                $user_data = $this->Auth->user(); 
                $user_id = $user_data['User']['id'];
                $p_id=$this->Session->Read('LastPurchaseID');
                $this->data['Payment']['merchent_reference']= substr($user_data['User']['name'],0,3).time();
                $paymentvalue = $this->data; 
                
                $lkr_currency=$paymentvalue['Payment']['amount'];
               // $lkr_currency=$eruroamount*172;
               
                // intergration details of merchant
                $pgdomain='www.paystage.com';
                $pgInstanceId='73787690';
                $merchantId='59485196';
                $hashKey='05190B07908C1E96';
                  // data of the form
                $perform='initiatePaymentCapture#sale';
                $currencyCode='144';
                $amount=$lkr_currency;
                $merchantReferenceNo=$this->data['Payment']['merchent_reference'];
                $orderDesc=$paymentvalue['Payment']['package'];
                $messageHash = $pgInstanceId."|".$merchantId."|".$perform."|".$currencyCode."|".$amount."|".$merchantReferenceNo."|".$hashKey."|";
                $message_hash = "CURRENCY:7:".base64_encode(sha1($messageHash, true));
                $content = "<div id='msg'><i>Now you are connecting to payment gateway...</i></div>";
                                  
                $content .= "<form method='post' name='newform' id='newform' action=\"https://$pgdomain/AccosaPG/verify.jsp\">";
                $content .= "<input type='hidden' name='pg_instance_id' value='$pgInstanceId' />";
                $content .= "<input type='hidden' name='merchant_id' value='$merchantId' />";
                $content .= "<input type='hidden' name='perform' value='$perform' />";
                $content .= "<input type='hidden' name='currency_code' value='$currencyCode' />";
                $content .= "<input type='hidden' name='amount' value='$amount' />";
                $content .= "<input type='hidden' name='merchant_reference_no' value='$merchantReferenceNo' />";
                $content .= "<input type='hidden' name='order_desc' value='$orderDesc' />";
                $content .= "<input type='hidden' name='message_hash' value='$message_hash' />";
                $content .= "</form>";
               
                $this->set('content',$content);
                $data = $this->Package->find('first', array('conditions' =>array('Package.name'=>$this->data['Payment']['package'])));
               
                $checkpurcharse_id = $this->Payment->find('count', array('conditions' =>array('Payment.purchase_id'=>$p_id)));
                $this->set('data',$data );
                
                
                $payments = array('user_id' => $user_id,'purchase_id'=>$p_id,'total_amount'=>$amount,'merchant_reference'=>$merchantReferenceNo,'message_hash'=>$message_hash,'status'=> 'NOT APPROVED','gateway_id'=>'SEYLANPG','is_authorized'=>'AUTHORIZED','authorized_admin'=>1);
                                   
                           $this->Session->Read('Auth.User.id');
                           $ip=$_SERVER['REMOTE_ADDR'];
                           $purcharse_meta= array('user_id' => $this->Session->Read('Auth.User.id'),'ip_address'=>$ip);                      $this->Purcharses_meta->create();
                           $this->Purcharses_meta->save($purcharse_meta); 
                 if($checkpurcharse_id=='0'){
                         if ($this->Payment->save($payments)) {
                           
                         }
                         else {
                           $this->Session->setFlash(__('The payment could not be saved. Please, try again.',true));
                         }
                   }
                 
                 
        } 
             
     } 
       
     
               
        function admin_view($id = null) {
		if (!$id) {
                    
			$this->Session->setFlash(__('Invalid payment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('payment', $this->Payment->read(null, $id));
                
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Payment->create();
			if ($this->Payment->save($this->data)) {
				$this->Session->setFlash(__('The payment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Payment->User->find('list');
		$purchases = $this->Payment->Purchase->find('list');
		$this->set(compact('users', 'purchases'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid payment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Payment->save($this->data)) {
				$this->Session->setFlash(__('The payment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Payment->read(null, $id);
		}
		$users = $this->Payment->User->find('list');
		$purchases = $this->Payment->Purchase->find('list');
		$this->set(compact('users', 'purchases'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for payment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Payment->delete($id)) {
			$this->Session->setFlash(__('Payment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Payment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
        
        function admin_search() {
     /*      $date = '';
           if (!empty($this->data)) {
              $date  = $this->data['Payment']['search'];
              $opts  = array(
                  'conditions' => array('Payment.created' => $date)
              );
              $listings   = $this->Payment->find('all', $opts); 

              $this->set('listings', $listings);
           }
           $this->set('date', $date); // so the keyword is saved. Can also get it via $this->dat*/
           $defaultFormData = array();
           $defaultFormData['Language']['language_code_id'] = '';
           $defaultFormData['Inventory']['search'] = 'Inventory';
        }

       
        function admin_viewpdf($id = null) {
          $datedetals = $this->getreport();
          $this->set('data',$datedetals);
          $this->layout = 'pdf';
          $this->render(); 
        
    } 
        function admin_viewuserpdf($id = null) {
          $user_detals = $this->getuserreport();
          $this->set('userdata',$user_detals);
          $this->layout = 'pdf';
          $this->render(); 
        
    } 
    
       function getreport() {
          
           $date=$this->params; 
           $id=$date['data']['Payment']['genarate'];
   
           if($id <> ""){
                       
                       $cond = array("date(Payment.created)" => $id); 
                       $data = $this->Payment->find('all', array('conditions' => $cond ));
                       return $data;
                }
            else {
                
                     $this->Session->setFlash(__('Payment date was not selected', true));
		     $this->redirect(array('action' => 'index'));

            }     
      } 
      
      function getuserreport() {
          
           $user=$this->params;
           $id_user=$user['data'] ['Payment'] ['user'];
           $id_array=explode('=', $id_user);
           $id=$id_array[0];
           if($id <> ''){
                      $cond = array("Payment.user_id" => $id); 
                      $data = $this->Payment->find('all', array('conditions' => $cond ));
                      return $data; 
 
           }
           else{
               
                 $this->Session->setFlash(__('User was not selected', true));
		 $this->redirect(array('action' => 'index'));
           }
      }
      
      function index(){
        
        if(!empty($_POST)){
       // debug($_POST);
        $this->layout = 'payment';     
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
        $packege_details =  $this->Package->find('first', array(
            'conditions' => array( 'Package.id' =>$check_validity['Purchase']['package_id']  ),
 ));
      
        //debug($check_validity);
        $merchant_client=$check_validity['Payment']['message_hash'];
        $this->set('pg_post',$_POST);
        $this->set('data',$check_validity );
       
        $this->set('p_data',$packege_details );
        if($pgstatus =='50020' && $messageHash=$messageHashClient){
           $this->Purchase->read(null,$check_validity ['Purchase']['id'] );
           $this->Purchase->set('status', 'APPROVED');
           $this->Purchase->save();
           //$this->Session->setFlash(__('Your transcation is completed.', true));
           $this->set('message',1 );
         }
         else {
             
             $this->set('message',0 );
        }
        
        
        //link controller
        
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

       
      }
      
       function view() {
            $this->layout = 'paymentview'; 
            $user_data = $this->Auth->user(); 
        
          /*  $this->Purchase->recursive = 0;
             $this->paginate['Purchase']['order'] = 'Purchase.date DESC';
             $this->paginate['Purchase']['limit'] = 25;
             $this->paginate['Purchase']['conditions'] = array('Purchase.user_id' =>$user_data['User']['id']);
             $this->paginate['Purchase']['joins'] = array(
	          	array(
		            'table' => 'payments',
                            'type' => 'INNER' ,
                            'alias' => 'Payment' ,
                            'conditions' => array(
	                    'Payment.purchase_id = Purchase.id',)));
           
                */
             
            //  debug( $this->paginate('Purchase'));
             
             $this->Payment->recursive = 0;
             $this->paginate['Payment']['order'] = 'Purchase.date DESC';
             $this->paginate['Payment']['limit'] = 25;
             $this->paginate['Payment']['conditions'] = array('Purchase.user_id' =>$user_data['User']['id']);
              $this->paginate['Payment']['fields'] =array('Payment.id','Payment.user_id','Payment.total_amount','Payment.status','User.id','Package.name','Package.id','Package.price','Purchases.date','Purchases.id');
             $this->paginate['Payment']['joins'] = array(
	          	array(
		            'table' => 'purchases',
                            'type' => 'LEFT' ,
                            'alias' => 'Purchases' ,
                            'foreignKey'    => false,
                            'conditions' => array(
	                    'Payment.purchase_id = Purchases.id',)),
                        array( 
                           'table' => 'packages',
                           'alias' => 'Package',
                           'type'  => 'LEFT', 
                           'foreignKey'    => false,
                           'conditions'    => array(' Purchases.package_id = Package.id'),));
          //   debug( $this->paginate('Payment'));
             $this->set('payments', $this->paginate('Payment'));
        
  }
  
      public function sendemail(){
              
              $user_data = $this->Auth->user();
              $purchase_id=$this->params['pass'][0];
              $payment_details=$this->Payment->find('first',array(
    				'conditions' => array(
	    			'Payment.purchase_id' => $purchase_id,),));
              
              $package_details=$this->Purchase->find('first',array(
    				'conditions' => array(
	    			'Purchase.id' => $purchase_id,),));
            
              $total_amount = $payment_details['Payment']['total_amount'];
              $date = $payment_details['Purchase']['date'];
              $status = $payment_details['Purchase']['status'];
              $package_name= $package_details['Package']['name'];
              $mercharnt_ref= $payment_details['Payment']['merchant_reference'];
              $from =$user_data['User']['email'];
              $to='shanika@loooops.com';
              $name=$user_data['User']['name'];
            
              
               $message  = '<html><body>';
	       $message .= '<table rules="all" style="border-color: #666;" border="2px"; cellpadding="10">';
	       $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $name. "</td></tr>";
	        
		$message .= "<tr><td><strong>Date:</strong> </td><td>" . $date . "</td></tr>";
		$message .= "<tr><td><strong>Package name :</strong> </td><td>" .$package_name. "</td></tr>";
                $message .= "<tr><td><strong>Total amount:</strong> </td><td>" .$total_amount. "</td></tr>";
                $message .= "<tr><td><strong>Merchant reference no  :</strong> </td><td>" .$mercharnt_ref. "</td></tr>";
		$message .= "<tr><td><strong>Status :</strong> </td><td>" .$status. "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";
                $this->emailsend($from, $to,$name,$message);
              
   }
   
    private function emailsend($from,$to,$name,$message){
             $subject="Comfirmation email from Life Leisure Holyday";
             $this->Email->to =$to ;
             $this->Email->bcc = array('shanika@loooops.com');  
             $this->Email->subject = $subject;
             $this->Email->replyTo = "shanika@loooops.com";
             $this->Email->from = $from;
             $this->Email->template = 'simple_message'; 
             $this->Email->sendAs = 'html'; // because we like to send pretty mail
             $messgebody=$message;
             $this->set('mailmessage',$messgebody);

                 if($this->Email->send()){
                    $this->Session->setFlash(__('Email is sent', true));
		    $this->redirect(array('action' => 'view'));
                 }
                 else{
                     $this->Session->setFlash(__('Email canot be sent. Try again', true));
                      $this->redirect(array('action' => 'view'));
                 }

    }
}