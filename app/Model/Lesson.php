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
}

