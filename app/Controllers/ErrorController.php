<?php

namespace App\Controllers;

class ErrorController extends BaseController {
	public function loadError403Page() {
        return $this->renderHTML('403Page.twig', ['tittle' => 'Unauthorized Access']);
    }

    public function loadError404Page() {
        return $this->renderHTML('404Page.twig', ['tittle' => 'Page Not Found']);
    }
}