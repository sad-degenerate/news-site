<?php

return [
	// MainController

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'main/index/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'index',
	],

    'category/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'category',
    ],

	'post/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'post',
	],

	// AdminController

	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],

    'admin/addCategory' => [
        'controller' => 'admin',
        'action' => 'addCategory',
    ],

    'admin/categories' => [
        'controller' => 'admin',
        'action' => 'categories',
    ],

    'admin/categories/{page:\d+}' => [
        'controller' => 'admin',
        'action' => 'categories',
    ],

	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],

	'admin/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],

    'admin/deleteCategory/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'deleteCategory',
    ],

    'admin/editCategory/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'editCategory',
    ],

	'admin/posts/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'posts',
	],

	'admin/posts' => [
		'controller' => 'admin',
		'action' => 'posts',
	],

    //AccountController

    'account/signIn' => [
        'controller' => 'account',
        'action' => 'signIn',
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],

    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],

    'account/profile' => [
        'controller' => 'account',
        'action' => 'profile',
    ],
];