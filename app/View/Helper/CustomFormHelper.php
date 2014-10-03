<?php
App::uses('AppHelper', 'View/Helper');

class CustomFormHelper extends AppHelper {

	/**
	 * Show validation errors for form
	 * 
	 * @param mixed $errors Error. Array or string
	 * @param string $class Class of container contain errors
	 */
	public static function validationSummary($errors, $class = "") {
		$html = "<div class=\"$class\">";

		if ($errors && !empty($errors)) {
			if (is_array($errors)) {
				$_errors = Set::flatten($errors);

				foreach ($_errors as $error) {
					$html .= "<p>$error</p>";
				}
			} else {
				$html .= "<p>$errors</p>";
			}
		}

		$html .= "</div>";

		return $html;
	}

}
