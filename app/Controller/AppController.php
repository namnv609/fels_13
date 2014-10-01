<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	
	public $helpers = array('CustomForm');
	
	public function beforeFilter() {
		$excludeFunctions = array('login', 'logout', 'register');
		$isAdmin = $this->Session->read("UserSession.isAdmin");
		
		if ($this->__adminAuthCheck() === TRUE) {
			if ($this->params["prefix"] == "admin"
				&& isset($this->params["prefix"])
				&& $isAdmin === 1
			) {
				$this->layout = "admin";
			} elseif ($this->params["prefix"] == "admin"
				&& isset($this->params["prefix"])
				&& $isAdmin !== 1
			) {
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
		} elseif (!in_array($this->action, $excludeFunctions)) {
			$this->redirect('/login');
		}
	}

	/**
	 * Check User login status
	 * 
	 * @return boolean Login status
	 */
	private function __adminAuthCheck() {
		$session = $this->Session->read('UserSession');

		if (isset($session["isLogin"])
			&& $session["isLogin"] === TRUE
		) {
			return TRUE;
		}

		return FALSE;
	}
}
