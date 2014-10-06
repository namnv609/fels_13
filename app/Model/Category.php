<?php

class Category extends AppModel {
	public static $slbStatus = array('1' => 'Activated', '0' => 'Inactivated');
	public $validate = array(
		'id' => array(
			'validID' => array(
				'rule' => array('notEmpty', 'numeric'),
				'message' => 'Category ID is invalid.'
			)
		),
		'name' => array(
			'empty' => array(
				'rule' => 'notEmpty',
				'message' => 'Category name not be blank'
			)
		)
	);
}
