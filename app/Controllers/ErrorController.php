<?php

namespace App\Controllers;

class ErrorController extends BaseController {
	public function loadError403Page() {
        return $this->renderHTML('errorPage.twig', [
            'page_tittle' => 'Unauthorized Access',
            'tittle' => 'Unauthorized Access'
        ]);
    }

    public function loadError404Page() {
        return $this->renderHTML('errorPage.twig', [
            'page_tittle' => 'Page Not Found',
            'tittle' => 'Page Not Found'
        ]);
    }
}