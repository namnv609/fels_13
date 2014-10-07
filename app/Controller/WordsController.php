<?php

class WordsController extends AppController {
	
	public $helpers = array("Paginator");
	public $paginate = array();
	public $categories = array('' => '---Categories---');


	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->loadModel('Category');
		
		$this->categories += $this->Category->find("list");
	}

	public function index() {
	}
	
	public function admin_index() {
		$queryString = $this->request->query;
		$conditions = array();
		
		if (isset($queryString["keyword"]) && !empty($queryString["keyword"])) {
			$conditions = array(
				"OR" => array(
					"Word.phrase LIKE" => "%$queryString[keyword]%",
					"Word.definition LIKE" => "%$queryString[keyword]%"
				)
			);
		}
		if (isset($queryString["category"]) && is_numeric($queryString["category"])) {
			$conditions["Word.category_id"] = $queryString["category"];
		}
		
		$this->paginate = array(
			'limit' => 10,
			'paramType' => 'querystring',
			'conditions' => $conditions,
			'order' => array('Word.id' => 'DESC')
		);
		
		$words = $this->paginate('Word');
		
		$this->set(
			array(
				'title_for_layout',
				'words',
				'categories',
				'queryStr'
			),
			array(
				__('Words Manage'),
				$words,
				$this->categories,
				$queryString
			)
		);
	}

	public function admin_edit($id = 0) {
		$layoutTitle = __('Insert Word');
		$word = $this->Word->findById($id);
		
		if ($id != null && $word == null) {
			throw new Exception('Word is invalid!');
		}
		if ($id != null) {
			$this->request->data = $word;
			$layoutTitle = __('Edit Word');
		}
		
		$this->set(
			array(
				'title_for_layout',
				'categories'
			),
			array(
				$layoutTitle,
				$this->categories
			)
		);
	}
	
	public function admin_save() {
		if ($this->request->is('POST')) {
			$formData = $this->request->data["Word"];
			$this->Word->set($formData);
			$redirectUrl = ADMIN_ALIAS . '/edit-word-' . $formData["id"];
			$flashMessage = __('Update word successful');
			
			if ($formData["id"] == "") {
				$flashMessage = __('Insert word successful');
				$redirectUrl = ADMIN_ALIAS . '/add-new-words';
				$this->Word->create();
			}
			
			if ($this->Word->save($formData)) {
				$this->Session->setFlash($flashMessage);
				$this->redirect($redirectUrl);
			}
		} else {
			$this->redirect(array('controller' => 'words', 'action' => 'index', 'admin' => TRUE));
		}
		
		$this->setAction("admin_edit");
	}
}
