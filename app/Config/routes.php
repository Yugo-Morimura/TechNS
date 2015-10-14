<?php

	Router::connect('/', ['controller' => 'users', 'action' => 'index']);
	Router::connect('/timeline', ['controller' => 'pages', 'action' => 'timeline']);
	Router::connect('/my_posts', ['controller' => 'pages', 'action' => 'my_posts']);
	Router::connect('/my_posts_liked', ['controller' => 'pages', 'action' => 'my_posts_liked']);
	Router::connect('/category/:alias', ['controller' => 'pages', 'action' => 'category']);
	Router::connect('/post/comment', ['controller' => 'posts', 'action' => 'comment']);
	Router::connect('/post/like', ['controller' => 'posts', 'action' => 'like']);
	Router::connect('/post/reply', ['controller' => 'posts', 'action' => 'reply']);
	Router::connect('/subscribe/:id', ['controller' => 'categories', 'action' => 'subscribe']);
	Router::connect('/unsubscribe/:id', ['controller' => 'categories', 'action' => 'unsubscribe']);
	Router::connect('/user/:action', ['controller' => 'users']);
	Router::connect('/notification/:action', ['controller' => 'notifications']);
	Router::connect('/notification/:action/*', ['controller' => 'notifications']);

	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
