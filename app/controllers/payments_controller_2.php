<?php
class PaymentsController extends AppController {

	var $name = 'Payments';
        var $actsAs = array ('Searchable');
        var $components = array('PaginateFormVariables');


	function admin_index() {
		$this->Payment->recursive = 0;
		$this->set('payments', $this->paginate());
                $results=$this->Payment->find('list', array('fields' => 'Payment.created'));
                $this->set('search_date', $results);
                
	}

       
      function add(){
          
                if(!empty($this->data)){
                $user_data = $this->Auth->user(); 
                    
                $this->data['Payment']['merchent_reference']= substr($user_data['User']['name'],0,3).time();
                $paymentvalue = $this->data; 
                $pgdomain='www.paystage.com';
                $pgInstanceId='73787690';
                $merchantId='59485196';
                $hashKey='05190B07908C1E96';
    
                $perform='initiatePaymentCapture#sale';
                $currencyCode='144';
                $amount=$paymentvalue['Payment']['amount'];
                $merchantReferenceNo=$this->data['Payment']['merchent_reference'];
                $orderDesc=$paymentvalue['Payment']['package'];;
              
                $messageHash = $pgInstanceId."|".$merchantId."|".$perform."|".$currencyCode."|".$amount."|".$merchantReferenceNo."|".$hashKey."|";
                $message_hash = "CURRENCY:7:".base64_encode(sha1($messageHash, true));
               // $invoice = file_get_contents("https://pg.enstage.com/pgcsr/merchant.php");
                $invoice = file_get_contents("http://localhost/seylan/pgresponse1.php");
 
                $content = "<i>Transaction is being processed, Please wait...</i>";
                                  
                $content .= "<form method='post' name='newform' id='newform' action=\"https://$pgdomain/AccosaPG/verify.jsp\">";
                $content .= "<input type='hidden' name='pg_instance_id' value='$pgInstanceId' />";
                $content .= "<input type='hidden' name='merchant_id' value='$merchantId' />";
                $content .= "<input type='hidden' name='perform' value='$perform' />";
                $content .= "<input type='hidden' name='currency_code' value='$currencyCode' />";
                $content .= "<input type='hidden' name='amount' value='$amount' />";
                $content .= "<input type='hidden' name='merchant_reference_no' value='$merchantReferenceNo' />";
                $content .= "<input type='hidden' name='order_desc' value='$orderDesc' />";
                $content .= "<input type='hidden' name='message_hash' value='$message_hash' />";
                $content .= "<input type='hidden' name='message_hash' value='$invoice' />";
               // debug($invoice);
                $content .= "</form>";
                    
                   
                    $user_id = $user_data['User']['id']; 
                    $p_id = $paymentvalue['Payment']['purchase_id'];
                    $payments = array('user_id' => $user_id,'purchase_id'=>$p_id,'total_amount'=>$amount,'merchant_reference'=>$merchantReferenceNo,'gateway_id'=>'seylanpg','is_authorized'=>'AUTHORIZED','authorized_admin'=>1);
                    //debug($payments);
          if($status=='50020'){
                  //  $this->Payment->save($payments);
                            if ($this->Payment->save($payments)) {                        
                                    $this->Session->setFlash(__('The payment has been saved', true));
                                    //$this->redirect(array('controller'=>'packages','action' => 'index'));
                            } else {
                                    $this->Session->setFlash(__('The payment could not be saved. Please, try again.', true));
                            }
		}
                $this->set('content',$content);
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
        function index(){
            
            
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

        
        
        function  send($id = null){
          $data=$this->params['pass'][0];
          $newdate=array(); 
          $results=$this->Payment->find('list', array('fields' => 'created'));
        //  debug($results);
          foreach($results as $key =>$new){
            $date= split(" ",$new);
           // $newdate[] =$date[0];  
            if($date[0]=$data){
            }
          }
          
      debug($newdate);
                $arr =  $newdate;
                $result = array();
                $prev_value = array('value' => null, 'amount' => null);
                foreach ($arr as $val) {
                    if ($prev_value['value'] != $val) {
                        unset($prev_value);
                        $prev_value = array('value' => $val, 'amount' => 0);
                        $result[] =& $prev_value;
                    }

                    $prev_value['amount']++;
                }

              //  debug($result);
                }
          //  }
}
