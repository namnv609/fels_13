<?php

class User extends AppModel {
	
	var $actsAs = array('Multivalidatable');
	public $validationSets = array(
		'login' => array(
			'email' => array(
				'empty' => array(
					'rule' => 'notEmpty',
					'message' => 'Email is required'
				),
				'validEmail' => array(
					'rule' => 'email',
					'message' => 'Please enter a valid email address'
				)
			),
			'password' => array(
				'empty' => array(
					'rule' => 'notEmpty',
					'message' => 'Password is required'
				)
			)
		),
		'register' => array(
			'name' => array(
				'rule' => 'notEmpty',
				'message' => 'Name is required'
			),
			'email' => array(
				'empty' => array(
					'rule' => 'notEmpty',
					'message' => 'Email is required'
				),
				'validEmail' => array(
					'rule' => 'email',
					'message' => 'Email is invalid'
				),
				'isUniq' => array(
					'rule' => 'isUnique',
					'message' => 'This email is already in used'
				)
			),
			'password' => array(
				'rule' => array('minLength', '8'),
				'message' => 'Minimum 8 characters long'
			)
		),
		'update' => array(
			'name' => array(
				'rule' => 'notEmpty',
				'message' => 'Name is required'
			),
			'avatar' => array(
				'rule' => array('extension', array('png', 'jpg', 'bmp', 'jpeg')),
				'message' => 'Please supply a valid image (png, jpg, bmp, jpeg)',
				'last' => TRUE
			),
			'password' => array(
				'rule' => array('minLength', 1),
				'message' => 'Minimun 8 characters long',
				'allowEmpty' => TRUE
			)
		)
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]["password"])) {
			$this->data[$this->alias]["password"] = md5($this->data[$this->alias]["password"]);
		}
		
		return TRUE;
	}

}
