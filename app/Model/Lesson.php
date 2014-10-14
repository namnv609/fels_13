<?php

class Lesson extends AppModel {
	public $hasOne = array(
		"Word" => array(
			"foreignKey" => FALSE,
			"conditions" => array("Word.id = Lesson.word_id")
		)
	);
	public $validate = array(
		"word_id" => array(
			"rule" => "notEmpty",
			"message" => "Correct answer is required"
		),
		"answer_a" => array(
			"rule" => "notEmpty",
			"message" => "Answer A is required"
		),
		"answer_b" => array(
			"rule" => "notEmpty",
			"message" => "Answer B is required"
		),
		"answer_c" => array(
			"rule" => "notEmpty",
			"message" => "Answer C is required"
		)
	);
	
	/**
	 * Get all question of category
	 * 
	 * @param int $categoryID ID of category
	 * @return array List questions
	 */
	public function getQuestions($categoryID) {
		$questions = $this->find("all", array(
			"conditions" => array(
				"Lesson.word_id IN (SELECT Word.id FROM words "
				. "WHERE Word.category_id = $categoryID)"
			),
			"fields" => array("Lesson.*", "Word.phrase", "Word.definition")
		));
		
		return $questions;
	}
	
	public function afterFind($results, $primary = false) {
		parent::afterFind($results, $primary);
		
		foreach ($results as $key => $value) {
			$results[$key]["Answer"][$value["Lesson"]["answer_a"]] = $value["Lesson"]["answer_a"];
			$results[$key]["Answer"][$value["Lesson"]["answer_b"]] = $value["Lesson"]["answer_b"];
			$results[$key]["Answer"][$value["Lesson"]["answer_c"]] = $value["Lesson"]["answer_c"];
			
			if (isset($value["Word"]["definition"])) {
				$results[$key]["Answer"][$value["Word"]["definition"]] = $value["Word"]["definition"];
			}
		}
		
		return $results;
	}
}

