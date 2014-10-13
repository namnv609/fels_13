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
	 * Get categories for user
	 * 
	 * @param int $userID User ID
	 * @return array List category and words has learned
	 */
	public function getUserCategories($userID) {
		$this->virtualFields["learned"] = "SELECT count(result.lesson_id) "
				. "FROM lessons AS lesson "
				. "INNER JOIN results AS result "
				. "ON lesson.id = result.lesson_id "
				. "WHERE lesson.word_id = word.id "
				. "AND result.user_id = " . $userID;
		
		$categories = $this->find("all", array(
			"joins" => array(
				array(
					"table" => "words",
					"alias" => "word",
					"type" => "INNER",
					"conditions" => array(
						"word.category_id = Category.id"
					)
				)
			),
			"group" => "word.category_id"
		));
		
		return $categories;
	}


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
