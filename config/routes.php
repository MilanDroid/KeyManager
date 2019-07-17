<?php

// APP ROUTES
// Permissions can be an unique value or an Array of values
$map->get('index', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexLoad',
    'auth' => true,
    'permissions' => array(
        'level' => [1,2,3]
    )
]);
$map->get('loginForm', '/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin',
    'auth' => false
]);
$map->post('auth', '/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin',
    'auth' => false
]);
$map->get('logout', '/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout',
    'auth' => true
]);
$map->get('userDashboard', '/dashboard', [
    'controller' => 'App\Controllers\UserController',
    'action' => 'getDashBoard',
    'auth' => true
]);