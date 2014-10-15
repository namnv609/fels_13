<?php

class ResultsController extends AppController {
	
	public function index($id = 0) {
		$this->loadModel('Category');
		$title = $this->Category->findById($id);
		
		$this->set(
			array(
				'title_for_layout',
				'results'
			),
			array(
				__('View result ') . $title["Category"]["name"],
				$this->Result->getResult($id, $this->Session->read('UserSession.userID'))
			)
		);
	}
}

