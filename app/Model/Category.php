<?php

class Category extends AppModel {
	
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
	
	public $hasMany = array(
		'Word' => array(
			'foreignKey' => 'category_id',
			'className' => 'Word'
		)
	);
	
	/**
	 * Get user actitvities
	 * 
	 * @param int $userID User id
	 * @return array Activities of user.
	 */
	public function getActivities($userID) {
		$activities = $this->find("all", array(
			"fields" => array("Category.name"),
			"joins" => array(
				array(
					"table" => "words",
					"alias" => "Word",
					"type" => "INNER",
					"foreignKey" => "category_id",
					"conditions" => array(
						'Category.id = Word.category_id'
					)
				)
			),
			'conditions' => array(
				'Word.id IN (SELECT Lesson.word_id FROM lessons AS Lesson '
				. 'INNER JOIN results AS Result '
				. 'ON Lesson.id = Result.lesson_id '
				. 'WHERE Result.user_id = '. $userID .')'
			),
			"group" => "Word.category_id"
		));
		
		return $activities;
	}
}
