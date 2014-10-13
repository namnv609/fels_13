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
	Router::connect('/profile', array(
		'controller' => 'users',
		'action' => 'index'
	));
	Router::connect('/profile/update', array(
		'controller' => 'users',
		'action' => 'save'
	));
	Router::connect('/word-list', array(
		'controller' => 'words',
		'action' => 'index'
	));
	Router::connect('categories', array(
		'controller' => 'categories',
		'action' => 'index'
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
	Router::connect(ADMIN_ALIAS . '/add-new-words:id',
		array(
			'controller' => 'words',
			'action' => 'edit',
			'admin' => TRUE,
			'id' => 0
		),
		array(
			'pass' => array('id'),
			'id' => '[0]'
		)
	);
	Router::connect(ADMIN_ALIAS . '/edit-word-:id',
		array(
			'controller' => 'words',
			'action' => 'edit',
			'admin' => TRUE,
			'id' => 0
		),
		array(
			'pass' => array('id'),
			'id' => '[0-9]+'
		)
	);
	Router::connect(ADMIN_ALIAS . '/save-word', array(
		'controller' => 'words',
		'action' => 'save',
		'admin' => TRUE
	));
	Router::connect(ADMIN_ALIAS . '/users-manage', array(
		'controller' => 'users',
		'action' => 'index',
		'admin' => TRUE
	));
	Router::connect(ADMIN_ALIAS . '/user-profile-:id',
		array(
			'controller' => 'users',
			'action' => 'edit',
			'admin' => TRUE,
			'id' => 0
		),
		array(
			'pass' => array('id'),
			'id' => '[0-9]+'
		)
	);
	Router::connect(ADMIN_ALIAS . '/update-user', array(
		'controller' => 'users',
		'action' => 'save',
		'admin' => TRUE
	));
	Router::connect(ADMIN_ALIAS . '/lessons-manage', array(
		'controller' => 'lessons',
		'action' => 'index',
		'admin' => TRUE
	));
	Router::connect(ADMIN_ALIAS . '/add-new-lesson:id',
		array(
			'controller' => 'lessons',
			'action' => 'edit',
			'admin' => TRUE,
			'id' => 0
		),
		array(
			'pass' => array('id'),
			'id' => '[0]'
		)
	);
	Router::connect(ADMIN_ALIAS . '/edit-lesson-:id',
		array(
			'controller' => 'lessons',
			'action' => 'edit',
			'admin' => TRUE,
			'id' => 0
		),
		array(
			'pass' => array('id'),
			'id' => '[0-9]+'
		)
	);
	Router::connect(ADMIN_ALIAS . '/save-lesson', array(
		'controller' => 'lessons',
		'action' => 'save',
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
