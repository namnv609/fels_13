<?php

class CategoriesController extends AppController {
	
	public $helpers = array("Paginator");
	public $paginate = array();

	public function index() {
	}
	
	public function admin_index($page = 1) {
		$this->passedArgs["page"] = $page;
		
		$this->paginate = array(
			'limit' => 1,
			'paramType' => 'querystring',
			'order' => array('id' => 'DESC')
		);
		$categories = $this->paginate("Category");
		
		$this->set(
			array(
				'title_for_layout',
				'categories'
			),
			array(
				__('Categories Manage'),
				$categories
			)
		);
	}
	
	public function admin_edit($id = 0) {
		$layoutTitle = __("Edit Category");
		$category = $this->Category->findById($id);
		
		if (count($category) <= 0) {
			$category = array(
				"Category" => array(
					"id" => 0,
					"name" => "",
					"status" => 1
				)
			);
			$layoutTitle = __("Add new Category");
		}
		
		$this->set(
			array(
				'title_for_layout',
				'category'
			),
			array(
				$layoutTitle,
				$category
			)
		);
	}
	
	public function admin_save() {
		if ($this->request->is('post')) {
			$formData = $this->request->data["Category"];
			$this->Category->set($formData);
			$redirectUrl = ADMIN_ALIAS . '/edit-category-' . $formData["id"];
			
			if ($this->Category->validates()) {
				$flashMessage = __("Update successful.");
				
				if ($formData["id"] <= 0) {
					$this->Category->create();
					$flashMessage = __("Insert successful.");
					$redirectUrl = ADMIN_ALIAS . '/add-new-category';
				}
				
				$this->Category->save($formData);
				$this->Session->setFlash($flashMessage, NULL);
				$this->redirect($redirectUrl);
			}
		} else {
			$this->redirect(array('controller' => 'categories', 'action' => 'index', 'admin' => TRUE));
		}
		
		$this->setAction('admin_edit');
	}
}