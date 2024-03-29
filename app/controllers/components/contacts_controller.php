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
    public $helpers = array('RecaptchaPlugin.Recaptcha','Html');
/**
 * Components
 *
 * @var array
 * @access public
 */
    public $components = array('Recaptcha.Recaptcha',
        'Akismet',
        'Email',
        'RecaptchaPlugin.Recaptcha',
       
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
        
      
      
    
      $checkneed1 = $this->params['form']['recaptcha_challenge_field'];
      $checkneed2 = $this->params['form']['recaptcha_response_field'];
      //$resp = recaptcha_check_answer ($privatekey,
                           //   $_SERVER["REMOTE_ADDR"],
                           //   $checkneed1,$checkneed2);
   //  echo $resp;
      
      //echo $_SERVER["REMOTE_ADDR"];
 

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
   
    function server_validate(){
       debug($_POST); 
       
       
    
    }
    

}
?>