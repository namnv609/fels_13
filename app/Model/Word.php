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
}
