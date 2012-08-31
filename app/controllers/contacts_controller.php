<?php
/**
 * Contacts Controller
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
class ContactsController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    
    public $name = 'Contacts';
    public $helpers = array('Html');
/**
 * Components
 *
 * @var array
 * @access public
 */
    public $components = array(
        'Akismet',
        'Email',
      
       
    );
    


/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
    public $uses = array('Contact');
    
    public function admin_index() {
        $this->set('title_for_layout', __('Contacts', true));

        $this->Contact->recursive = 0;
        $this->paginate['Contact']['order'] = 'Contact.title ASC';
        $this->set('contacts', $this->paginate());
    }

    public function admin_add() {
        $this->set('title_for_layout', __('Add Contact', true));

        if (!empty($this->data)) {
            $this->Contact->create();
            if ($this->Contact->save($this->data)) {
                $this->Session->setFlash(__('The Contact has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Contact could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
    }

    public function admin_edit($id = null) {
        $this->set('title_for_layout', __('Edit Contact', true));

        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Contact', true), 'default', array('class' => 'error'));
            $this->redirect(array('action'=>'index'));
        }
        if (!empty($this->data)) {
            if ($this->Contact->save($this->data)) {
                $this->Session->setFlash(__('The Contact has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Contact could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Contact->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Contact', true), 'default', array('class' => 'error'));
            $this->redirect(array('action'=>'index'));
        }
        if (!isset($this->params['named']['token']) || ($this->params['named']['token'] != $this->params['_Token']['key'])) {
            $blackHoleCallback = $this->Security->blackHoleCallback;
            $this->$blackHoleCallback();
        }
        if ($this->Contact->delete($id)) {
            $this->Session->setFlash(__('Contact deleted', true), 'default', array('class' => 'success'));
            $this->redirect(array('action'=>'index'));
        }
    }

    public function view($alias = null) {
       App::import('Vendor', 'recaptcha/recaptchalib');
      
       //debug($this->params['form']);
       $recaptcha = new recaptcha();
       $publickey = "6LdvstASAAAAAFdYiGW6ASPvDT6u4P7eapH89jkn";
       $privatekey = "6LdvstASAAAAAKNMflLnCF9FSYrytCjzPAHymKSl";
 
       $resp = null;
       $error = null;
 
  
      $data = $this->params['form']; 
     // debug($data);
   
  //if (isset($this->params['form'])) {
      if (!empty ($data['recaptcha_response_field'])) {
        $resp = $recaptcha->recaptcha_check_answer ($privatekey,
                                      $_SERVER["REMOTE_ADDR"],
                                      @$_POST["recaptcha_challenge_field"],
                                      @$_POST["recaptcha_response_field"]);
        
        //debug($resp);

              if ($resp->is_valid) {
                  $from=$data['email'];
                  $to="shanika@loooops.com";
                  $name=$data['name'];
               //   $message='The message is :'.$data['message'].' and  contact telephone number :'.$data['tel'];
				  $message  = '<html><body>';
	              $message .= '<table rules="all" style="border-color: #666;" border="2px"; cellpadding="10">';
	              $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $name. "</td></tr>";
	              $message .= "<tr><td><strong>Email</strong> </td><td>" . $from . "</td></tr>";
		          $message .= "<tr><td><strong>Telephone number</strong> </td><td>" .$data['tel']. "</td></tr>";
                  $message .= "<tr><td><strong>Message</strong> </td><td>" .$data['message']. "</td></tr>";
                  $message .= "</table>";
				  $message .= "</body></html>";
				  
				  $this->emailsend($from, $to,$name,$message);
                  $msg="Your email sent. Thank You";
                  $this->set('message',$msg);
              }
              else{
                  $msg="Error of your recaptcha.. try again";
                  $this->set('message',$msg);
              }
     }

     else {
         $msg="Enter the recaptcha fields";
         $this->set('message',$msg);
     }
 
$send = $recaptcha->recaptcha_get_html($publickey, $error);
$this->set('rechapcha',$send);

 }
    
    private function emailsend($from,$to,$name,$message){
     $subject="Contact-us  message from $name";
     $this->Email->to =$to ;
     $this->Email->bcc = array('shanika@loooops.com');  
     $this->Email->subject = $subject;
     $this->Email->replyTo = "shanika@loooops.com";
     $this->Email->from = $from;
     $this->Email->template = 'message_contact'; 
     $this->Email->sendAs = 'html'; // because we like to send pretty mail
     $this->set('mailmessage',$message);
     //Do not pass any args to send()
         if($this->Email->send()){
             $this->Session->setFlash(__('Email is sent successfully', true));
           $this->redirect("view");
         }
         
         else{
          $this->Session->setFlash(__('Email is not..try again', true));
            // echo "error";
         }
   // echo 'hhhhhhh';
    }

    private function __validation($continue, $contact) {
        if ($this->Contact->Message->set($this->data) &&
            $this->Contact->Message->validates() &&
            $continue === true) {
            if ($contact['Contact']['message_archive'] &&
                !$this->Contact->Message->save($this->data['Message'])) {
                $continue = false;
            }
        } else {
            $continue = false;
        }

        return $continue;
    }

    private function __spam_protection($continue, $contact) {
        if (!empty($this->data) &&
            $contact['Contact']['message_spam_protection'] &&
            $continue === true) {
            $this->Akismet->setCommentAuthor($this->data['Message']['name']);
            $this->Akismet->setCommentAuthorEmail($this->data['Message']['email']);
            $this->Akismet->setCommentContent($this->data['Message']['body']);
            if ($this->Akismet->isCommentSpam()) {
                $continue = false;
                $this->Session->setFlash(__('Sorry, the message appears to be spam.', true), 'default', array('class' => 'error'));
            }
        }

        return $continue;
    }

    private function __captcha($continue, $contact) {
        if (!empty($this->data) &&
            $contact['Contact']['message_captcha'] &&
            $continue === true &&
            !$this->Recaptcha->valid($this->params['form'])) {
            $continue = false;
            $this->Session->setFlash(__('Invalid captcha entry', true), 'default', array('class' => 'error'));
        }

        return $continue;
    }

    private function __send_email($continue, $contact) {
        if ($contact['Contact']['message_notify'] &&
            $continue === true) {
            $this->Email->from = Configure::read('Site.title') . ' '
                    . '<croogo@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
            $this->Email->to = $contact['Contact']['email'];
            $this->Email->from = $this->data['Message']['name'] . ' <' . $this->data['Message']['email'] . '>';
            $this->Email->subject = '[' . Configure::read('Site.title') . '] ' . $contact['Contact']['title'];
            $this->Email->template = 'contact';

            $this->set('contact', $contact);
            $this->set('message', $this->data);
            $this->Email->send();
        }

        return $continue;
    }
   
  
    

}
?>