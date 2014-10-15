<?php

class Result extends AppModel {
	
	/**
	 * Delete old result to preparing for new lesson
	 * 
	 * @param int $categoryID Category ID
	 * @param int $userID User ID
	 * @return boolean
	 */
	public function deleteOldResult($categoryID, $userID) {
		$this->deleteAll(array(
			"Result.user_id = $userID",
			"Result.lesson_id IN (SELECT Lesson.id FROM lessons AS Lesson "
				. "INNER JOIN words AS Word "
				. "ON Word.id = Lesson.word_id "
				. "WHERE Word.category_id = $categoryID)"
		), FALSE);
		
		return TRUE;
	}
	
	/**
	 * Get result for user by category
	 * 
	 * @param int $categoryID Category ID
	 * @param int $userID User id
	 * @return array Result of category by user
	 */
	public function getResult($categoryID, $userID) {
		$this->virtualFields["isCorrect"] = "IF("
			. "LOWER(Word.definition) = LOWER(Result.answer), '✔', '✘'"
			. ")";
		
		$result = $this->find("all", array(
			"joins" => array(
				array(
					"table" => "lessons",
					"alias" => "Lesson",
					"type" => "INNER",
					"conditions" => array(
						"Lesson.id = Result.lesson_id"
					)
				),
				array(
					"table" => "words",
					"alias" => "Word",
					"type" => "INNER",
					"conditions" => array(
						"Word.id = Lesson.word_id"
					)
				)
			),
			"conditions" => array(
				"Lesson.word_id IN (SELECT Word.id from words "
				. "WHERE Word.category_id = $categoryID)",
				"Result.user_id = $userID"
			),
			"fields" => array(
				"Word.definition",
				"Word.phrase",
				"Result.*"
			)
		));
		
		return $result;
	}
}