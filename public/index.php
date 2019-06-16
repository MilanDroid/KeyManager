<?php
/**
* @author Be+ MilanDroid beplusdev@gmail.com
* @copyright 2019 Be+
* @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
* @version v0.0.1
* @link https://github.com/BePlusDevelopments/VIO
*/

// ERRORS DISPLAY
ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

// THIS FILE CONTAINS THE PRIMARY STRUCTURE, ROUTES, DB CONNECTION, ETC...
require_once '../config/app.php';

// ROUTE IS A VARIABLE LOADED ON CONFIG/APP.PHP
// ELIMINAR ESTA PARTE DEBUGERCODE
/*******************************/
//var_dump($_POST, $_SESSION);
/*******************************/
if (!$route) {
    /*
    HERE'S COME 'NON FOUND PAGE'
    CAN EDIT IT ON resources/views/nonFound.twig
    */
    $controllerName = 'App\Controllers\ErrorController';
    $actionName = 'loadError404Page';
} else {
    //GET THE PARAMETERS TO LOAD THE PAGE
    $handlerData = $route->handler;
    //THIS VARIABLE CHECKS IF THE PAGE CAN BE LOADED OR NOT FOR PERMISSIONS
    $load = true;

    /*
    THE HANDLER DATA IS COMPARED WITH THE 'SESSION' VALUES TO CHECK IF IS AVAILABELE TO THE USER.
    FUNCTION getPass() IS ON config/validations.php
    */
    // ELIMINAR ESTA PARTE DEBUGERCODE
    /*******************************/
    //var_dump($handlerData);
    /*******************************/
    if(isset($handlerData['permissions'])) {
        $load = $helper->getPass($handlerData['permissions']);
    }

    if(!isset($_SESSION['userId']['auth']) && $handlerData['auth']) {
        /*
        IF THE PAGE NEEDS PEMISSIONS AND THE USER ISN'T LOGED
        RETURN THE LOGIN PAGE
        CAN EDIT IT ON resources/views/login.twig
        */
        $controllerName = 'App\Controllers\AuthController';
        $actionName = 'getLogin';
    } else if(!$load && $_SESSION['userId']['auth']) {
        /*
        HERE'S COME THE 'FORBIDDEN PAGE'
        CAN EDIT IT ON resources/views/nonAccess.twig
        */
        $controllerName = 'App\Controllers\ErrorController';
        $actionName = 'loadError403Page';
    } else {
        /*
        HERE CALLS EVERY EXISTING PAGE
        TO LOAD VIEWS AND VARIABLES        
        ROUTE PARAMETERS CAN BE EDITED ON config/routes.php
        */
        $controllerName = $handlerData['controller'];
        $actionName = $handlerData['action'];
    }
}

$controller = new $controllerName;
$response = $controller->$actionName($request);

foreach($response->getHeaders() as $name => $values) {
    foreach($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

http_response_code($response->getStatusCode());
echo $response->getBody();