<?php

class Word extends AppModel {
	public $belongsTo = array(
		"Category" => array(
			"className" => "Category",
			"foreignKey" => "category_id"
		)
	);
	public $validate = array(
		"phrase" => array(
			"rule" => "notEmpty",
			"message" => "Phrase not be blank"
		),
		"definition" => array(
			"rule" => "notEmpty",
			"message" => "Definition not be blank"
		),
		"category_id" => array(
			"rule" => array("notEmpty", "numeric"),
			"message" => "Category not be blank"
		)
	);
	
	/**
	 * Get words not yet have a question
	 * 
	 * @param array $ids List word ids have a question
	 * @return array List word not yet have a question
	 */
	public function wordList($ids) {
		$words = array('' => '---Words---');
		$words += $this->find('list', array(
			'conditions' => array(
				'NOT' => array("Word.id" => $ids)
			),
			"fields" => array("Word.phrase")
		));
		
		return $words;
	}
}
