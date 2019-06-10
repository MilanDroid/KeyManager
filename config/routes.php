<?php

// APP ROUTES
$map->get('index', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexLoad',
    'auth' => true
]);
$map->get('loginForm', '/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);
$map->post('auth', '/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'
]);
$map->get('userDashboard', '/dashboard', [
    'controller' => 'App\Controllers\UserController',
    'action' => 'getDashBoard',
    'permissions' => [
        'level' => 3,
    ]
]);

//TEMPLATE ROUTES, DELETE LATER
// $map->get('addJobs', '/jobs/add', [
//     'controller' => 'App\Controllers\JobsController',
//     'action' => 'getAddJobAction'
// ]);
// $map->post('saveJobs', '/jobs/add', [
//     'controller' => 'App\Controllers\JobsController',
//     'action' => 'getAddJobAction'
// ]);
// $map->get('addUser', '/users/add', [
//     'controller' => 'App\Controllers\UsersController',
//     'action' => 'getAddUser'
// ]);
// $map->post('saveUser', '/users/save', [
//     'controller' => 'App\Controllers\UsersController',
//     'action' => 'postSaveUser'
// ]);
// $map->get('logout', '/logout', [
//     'controller' => 'App\Controllers\AuthController',
//     'action' => 'getLogout'
// ]);
// $map->post('auth', '/auth', [
//     'controller' => 'App\Controllers\AuthController',
//     'action' => 'postLogin'
// ]);
// $map->get('admin', '/admin', [
//     'controller' => 'App\Controllers\AdminController',
//     'action' => 'getIndex',
//     'auth' => true
// ]);