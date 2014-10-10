<?php

class HomeController extends AppController {
	
	public $uses = array('User', 'Category');
	
	public function index() {
		$userID = $this->Session->read("UserSession.userID");
		
		$this->set(
			array(
				'title_for_layout',
				'avatar',
				'activities'
			),
			array(
				__('Home'),
				$this->User->findById($userID, array(
					'fields' => "avatar"
				)),
				$this->Category->getActivities($userID)
			)
		);
	}

	public function admin_index() {
		$this->set('title_for_layout', __('Administrator Dashboard'));
	}

}
