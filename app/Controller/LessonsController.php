<?php

class LessonsController extends AppController {
	
	public $helpers = array("Paginator");
	public $paginate = array();
	
	public function index() {
	}
	
	public function admin_index() {
		$this->paginate = array(
			'limit' => 15,
			'paramType' => 'querystring',
			'order' => array('Lesson.id' => 'DESC'),
			'fields' => array(
				'Lesson.*', 'Word.phrase'
			)
		);
		
		$lessons = $this->paginate('Lesson');
		
		$this->set(
			array(
				'title_for_layout',
				'lessons'
			),
			array(
				__('Lessons Manage'),
				$lessons
			)
		);
	}
	
	public function admin_edit($id = 0) {
		$layoutTitle = __('Insert Lesson');
		$lesson = $this->Lesson->findById($id);
		$this->loadModel('Word');
		$wordIds = $this->Lesson->find("list", array("fields" => "Lesson.word_id"));
		
		if ($id !== NULL && $id > 0) {
			unset($wordIds[$id]);
		}
		if ($id != NULL && $lesson == NULL) {
			$this->redirect(array(
				'controller' => 'lessons',
				'action' => 'index',
				'admin' => TRUE
			));
		}
		if ($id != NULL) {
			$this->request->data = $lesson;
			$layoutTitle = __('Edit Lesson');
		}
		
		$this->set(
			array(
				'title_for_layout',
				'lesson',
				'words'
			),
			array(
				$layoutTitle,
				$lesson,
				$this->Word->wordList($wordIds)
			)
		);
	}
	
	public function admin_save() {
		if ($this->request->is('POST')) {
			$formData = $this->request->data["Lesson"];
			$this->Lesson->set($formData);
			$redirectUrl = ADMIN_ALIAS . '/edit-lesson-' . $formData["id"];
			$flashMessage = __('Update lesson successful');
			
			if ($formData["id"] == "") {
				$flashMessage = __("Insert lesson successful");
				$redirectUrl = ADMIN_ALIAS . '/add-new-lesson';
			}
			if ($this->Lesson->save()) {
				$this->Session->setFlash($flashMessage);
				$this->redirect($redirectUrl);
			}
		} else {
			$this->redirect(array(
				'controller' => 'lessons',
				'action' => 'index',
				'admin' => TRUE
			));
		}
		
		$this->setAction('admin_edit');
	}
}
