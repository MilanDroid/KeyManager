<?php

namespace App\Controllers;

use \Twig_Loader_Filesystem;
use Zend\Diactoros\Response\HtmlResponse;

//ELIMINAR ESTA PARTE DEBUGERCODE
/*******************************/
use DebugBar\StandardDebugBar;
/*******************************/

class BaseController {
    protected $templateEngine;

    public function __construct() {
        $loader = new Twig_Loader_Filesystem('../resources/views');
        $this->templateEngine = new \Twig_Environment($loader, array(
            'debug' => true,
            'cache' => false,
        ));
    }

    public function renderHTML($fileName, $data = []) {
        return new HtmlResponse($this->templateEngine->render($fileName, $data));
    }
}