<?php

	Router::connect('/', array('controller' => 'home', 'action' => 'index'));
	/**
	 * ...and connect the rest of 'Pages' controller's URLs.
	 */
	Router::connect('/login', array(
			'controller' => 'users',
			'action' => 'login'
	));
	Router::connect('/logout', array(
			'controller' => 'users',
			'action' => 'logout'
	));
	Router::connect('/register', array(
		'controller' => 'users',
		'action' => 'register'
	));
	/**
	 * Routes for admin (back-end)
	 */
	Router::connect(ADMIN_ALIAS, array(
		'controller' => 'home',
		'action' => 'index',
		'admin' => TRUE
	));

	Router::connect(ADMIN_ALIAS . '/categories-manage', array(
		'controller' => 'categories',
		'action' => 'index',
		'admin' => TRUE
	));
	Router::connect(ADMIN_ALIAS . '/add-new-category:id', array(
			'controller' => 'categories',
			'action' => 'edit',
			'admin' => TRUE,
			'id' => 0
		),
		array(
			'pass' => array('id'),
			'id' => '[0]'
		)
	);
	Router::connect(ADMIN_ALIAS . '/edit-category-:id',
		array(
			'controller' => 'categories',
			'action' => 'edit',
			'admin' => TRUE,
			'id' => 0
		),
		array(
			'pass' => array('id'),
			'id' => '[0-9]+'
		)
	);
	Router::connect(ADMIN_ALIAS . '/save-category', array(
		'controller' => 'categories',
		'action' => 'save',
		'admin' => TRUE
	));

	Router::connect(ADMIN_ALIAS . '/words-manage', array(
		'controller' => 'words',
		'action' => 'index',
		'admin' => TRUE
	));
	/**
	 * Load all plugin routes. See the CakePlugin documentation on
	 * how to customize the loading of plugin routes.
	 */
	CakePlugin::routes();

	/**
	 * Load the CakePHP default routes. Only remove this if you do not want to use
	 * the built-in default routes.
	 */
	require CAKE . 'Config' . DS . 'routes.php';
