<?php

namespace App\config;

use App\src\controller\ErrorController;
use App\src\controller\FrontController;

class Router {

    private $frontController;
    private $errorController;

    public function __construct() {
    	$this->frontController = new FrontController();
    	$this->errorController = new ErrorController();
    }

	public function run() {
		try {
			if (isset($_GET['route'])) {
				if ($_GET['route'] === 'article') {
					$this->frontController->article($_GET['idArt']);
				}
				else {
					$this->errorController->unknown();
				}
			}
			else {
				$this->frontController->home();
			}
		}
		catch (Exception $e) {
			$this->errorController->error();
		}
	}
}