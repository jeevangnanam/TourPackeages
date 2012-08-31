<?php
/**
 * Contact
 *
 * PHP version 5
 *
 * @category Model
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Contact extends AppModel {
/**
 * Model name
 *
 * @var string
 * @access public
 */
    public $name = 'Contact';
/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
    public $actsAs = array(
        'Cached' => array(
            'prefix' => array(
                'contact_',
            ),
        ),
    );
/**
 * Validation
 *
 * @var array
 * @access public
 */
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
            'message' => 'This field cannot be left blank.',
        ),
        'alias' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'This alias has already been taken.',
            ),
            'minLength' => array(
                'rule' => array('minLength', 1),
                'message' => 'Alias cannot be empty.',
            ),
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'Please provide a valid email address.',
        ),
        
        'recaptcha_response_field' => array(
           'rule' => array('checkRecaptcha', 'recaptcha_challenge_field'),
           'message' => 'You did not enter the words correctly. Please try again.',
        ),
        
    );
/**
 * Model associations: hasMany
 *
 * @var array
 * @access public
 */
    public $hasMany = array(
        'Message' => array(
            'className' => 'Message',
            'foreignKey' => 'contact_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '3',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ),
    );
    
    function beforeValidate(&$model) {
        $model->validate['recaptcha_response_field'] = array(
            'checkRecaptcha' => array(
                'rule' => array('checkRecaptcha', 'recaptcha_challenge_field'),
                'message' => 'You did not enter the words correctly. Please try again.',
            ),
        );
    } 
}
?>