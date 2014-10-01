<?php

class UsersController extends AppController {
	
	public function index() {
		
	}

	public function login() {
		$redirectUrl = array('controller' => 'home', 'action' => 'index', 'admin' => TRUE);
		
		if ($this->request->is('POST')) {
			$formData = $this->request->data["User"];
			$this->User->setValidation('login');
			$this->User->set($formData);

			if ($this->User->validates()) {
				$userInfo = $this->User->findByEmail($formData['email']);

				if (isset($userInfo["User"])
					&& $userInfo["User"]["password"] === md5($formData["password"])
					&& $userInfo["User"]["status"] == 1
				) {
					if ($userInfo["User"]["admin"] <= 0) {
						$redirectUrl = array('controller' => 'home', 'action' => 'index');
					}

					$this->Session->write(
						'UserSession', 
						array(
							'userID'	=> (int) $userInfo["User"]["id"],
							'userName'	=> $userInfo["User"]["name"],
							'isAdmin'	=> (int) $userInfo["User"]["admin"],
							'isLogin'	=> TRUE
						)
					);

					$this->redirect($redirectUrl);
				} else {
					$this->Session->setFlash(__('Email or password is invalid'));
				}
			} else {
				$this->set('validationErrs', $this->User->validationErrors);
			}
		}

		$this->set('title_for_layout', __('Login'));

		$this->layout = NULL;
	}
	
	public function register() {
		if ($this->request->is('post')) {
			$formData = $this->request->data["User"];
			$this->User->setValidation('register');
			$this->User->set($formData);
			
			if ($this->User->validates()) {
				$this->User->create();
				
				if ($this->User->save($formData)) {
					$this->Session->setFlash(__('Register successfull.'));
					
					$this->redirect('/login');
				} else {
					$this->Session->setFlash(__('Error occurred when register. Please try again little bit'));
				}
			}
		}
		
		$this->layout = NULL;
	}

	public function logout() {
		$this->Session->delete('UserSession');
		$this->Session->setFlash(__('You have logged out'));

		$this->redirect(array('controller' => 'users', 'action' => 'login'));
	}

}
