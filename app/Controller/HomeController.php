<?php

class HomeController extends AppController {

	public function index() {
		
	}

	public function admin_index() {
		$this->set('title_for_layout', __('Administrator Dashboard'));
	}

}
