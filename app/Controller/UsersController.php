<?php

class UsersController extends AppController {
	
	public $helpers = array('Paginator');
	public $paginate = array();


	public function index() {
		$userID = $this->Session->read("UserSession.userID");
		$this->request->data = $this->User->findById($userID);
		
		$this->set('title_for_layout', __('User info'));
	}
	
	public function save(){
		if ($this->request->is('put') || $this->request->is('post')) {
			$userID = $this->Session->read("UserSession.userID");
			$formData = $this->request->data["User"];
			$this->User->setValidation('update');
			$fileName = $this->__uploadAvatar($formData["avatar"], $userID);
			$this->User->id = $userID;
			$fields = array("name");
			
			if (!empty($formData["password"])) {
				$fields[] = "password";
			}
			if (!empty($formData["avatar"]["name"])
				&& $fileName != ""
			) {
				$formData["avatar"] = $fileName;
				$fields[] = "avatar";
			}
			$this->User->set($formData);
			
			if ($this->User->save(NULL, TRUE, $fields)) {
				$this->Session->setFlash(__('Update user successful'));
				$this->redirect('/profile');
			}
		} else {
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'index'
			));
		}
		
		$this->setAction('index');
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
	
	public function admin_index() {
		$this->paginate = array(
			'limit' => 15,
			'paramType' => 'querystring',
			'conditions' => array(
				'admin' => 0
			),
			'order' => array('id' => 'DESC'),
		);
		
		$users = $this->paginate('User');
		
		$this->set(
			array(
				'title_for_layout',
				'users'
			),
			array(
				__('Users Manage'),
				$users
			)
		);
	}
	
	public function admin_edit($id = 0) {
		$user = $this->User->findById($id);
		
		if ($id != NULL && $user == NULL) {
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'index',
				'admin' => TRUE
			));
		}
		
		if ($id != NULL) {
			$this->request->data = $user;
		}
		
		$this->set('title_for_layout', __('Edit User'));
	}
	
	public function admin_save() {
		if ($this->request->is('put') || $this->request->is('post')) {
			$formData = $this->request->data["User"];
			$this->User->setValidation('update');
			$fileName = $this->__uploadAvatar($formData["avatar"], $formData["id"]);
			$fields = array("name");
			
			if (!empty($formData["password"])) {
				$fields[] = "password";
			}
			if (!empty($formData["avatar"]["name"])
				&& $fileName != ""
			) {
				$formData["avatar"] = $fileName;
				$fields[] = "avatar";
			}
			$this->User->set($formData);
			
			if ($this->User->save(NULL, TRUE, $fields)) {
				$this->Session->setFlash(__('Update user successful'));
				$this->redirect(ADMIN_ALIAS . '/user-profile-' . $formData["id"]);
			}
		} else {
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'index',
				'admin' => TRUE
			));
		}
		
		$this->setAction('admin_edit');
	}
	
	/**
	 * Upload avatar
	 * 
	 * @param array $file File info
	 * @param int $userId User id
	 * @return string File name in server
	 */
	private function __uploadAvatar($file, $userId) {
		$fileType = pathinfo($file["name"], PATHINFO_EXTENSION);
		$fileName = md5($userId) . '.' . $fileType;
		$destination = WWW_ROOT . 'img' . DS . $fileName;
		
		if (in_array($fileType, array('png', 'jpg', 'bmp', 'jpeg'))
			&& move_uploaded_file($file["tmp_name"], $destination)
		) {
			return $fileName;
		}
		
		return "";
	}
}
