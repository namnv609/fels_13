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
}