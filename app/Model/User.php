<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Post $Post
 * @property UserHistory $UserHistory
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';
	
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'A username is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between', 5, 15),
				'message' => 'Usernames must be between 5 to 15 characters',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUniqueUsername'),
				'message' => 'This username is already in use',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumericDashUnderscore' => array(
				'rule' => array('alphaNumericDashUnderscore'),
				'message' => 'Username can only be letters, numbers and underscores',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'A password is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'min_length' => array(
				'rule' => array('minLength', 6),
				'message' => 'Password must have a minimum of 6 characters',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
        'confirm_password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please confirm your password'
            ),
            'equaltofield' => array(
                'rule' => array('equaltofield', 'password'),
                'message' => 'Both passwords must match.'
            )
        ),
        
		'email' => array(
			'email' => array(
				'rule' => array('email', true),
				'message' => 'Please provide a valid email address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUniqueEmail'),
				'message' => 'This email is already in use',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between', 5, 60),
				'message' => 'email must be between 5 to 60 characters',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role' => array(
			'inList' => array(
				'rule' => array('inList', array('admin', 'editor', 'viewer')),
				'message' => 'Please enter a valid role',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
        'current_password' => array(
            'checkCurrentPassword' => array(
                'rule' => 'checkCurrentPassword',
                'message' => 'Current password doesn\'t match!',
                'allowEmpty' => false,
                'required' => false               
            ),         
        ),
		
        'new_password' => array(
            'min_length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Password must have a minimum of 6 characters',
                'allowEmpty' => true,
                'required' => false
            )
        ),
        'confirm_new_password' => array(
            'equaltofield' => array(
                'rule' => array('equaltofield', 'new_password'),
                'message' => 'Both passwords must match',
                'required' => false
            )
        )
	);	

    /**
     * Before isUniqueUsername
     * $param array $options
     * @return boolean
     */
     function isUniqueUsername($check) {
         $username = $this->find('first', array(
            'fields' => array('User.id', 'User.username'),
            'conditions' => array('User.username' => $check['username'])
         ));
         
         if(!empty($username)) {
             if($this->data[$this->alias]['id'] == $username['User']['id']) {
                 return true;
             } else {
                 return false;
             }
         } else {
             return true;
         }
     }

    /**
     * Before isUniqueEmail
     * @param array $options
     * $return boolean
     */
     function isUniqueEmail($check) {
         $email = $this->find('first', array(
            'fields' => array('User.id'),
            'conditions' => array('User.email' => $check['email'])
         ));
         
         if(!empty($email)) {
             if($this->data[$this->alias]['id'] == $email['User']['id']) {
                 return true;
             } else {
                 return false;
             }
         } else {
             return true;
         }
     }
     
    public function checkCurrentPassword($check) {
        $this->id = AuthComponent::user('id');
        $password = $this->field('password');
        return(AuthComponent::password($check['current_password']) == $password);
    }
     
     public function alphaNumericDashUnderscore($check) {
         // $data array is passed using the form field name as the key
         // have to extract the value to make the function generic
         $value = array_values($check);
         $value = $value[0];
         return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
     }
     
     public function equaltofield($check, $otherfield) {
         // get name of field
         $fname = '';
         foreach ($check as $key => $value) {
             $fname = $key;
             break;
         }
         return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
     }
	 
     /**
      * Before Save
      * @param array $options
      * @return boolean
      */
      public function beforeSave($options = array()) {
          // hash our password
          if(isset($this->data[$this->alias]['password'])) {
              $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
          }
          
          // if we get a new password, hash it
          if (isset($this->data[$this->alias]['new_password']) && !empty($this->data[$this->alias]['new_password'])) {
              $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['new_password']);
          }
          
          // fallback to our parent
          return parent::beforeSave($options);
      }	 


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'UserHistory' => array(
			'className' => 'UserHistory',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
