<?php
namespace App\config;

use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;


class Router {

    private $frontController;
    private $backController;
    private $errorController;

    public function __construct() {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run() {
        try {
            if (isset($_GET['route'])) {
                if ($_GET['route'] === 'article') {
                    if (isset($_GET['idArt']) && $_GET['idArt'] > 0) {
                        $this->frontController->article($_GET['idArt']);
                    }
                    else {
                        $this->errorController->unknown();
                    }
                }
                else if ($_GET['route'] === 'updateArticle') {
                    $this->backController->updateArticle($_GET['idArt']);
                }
                else if ($_GET['route'] === 'deleteArticle&idArt') {
                    $this->backController->deleteArticle($_GET['idArt']);
                }
                else if ($_GET['route'] === 'adminAddArticle') {
                    $this->backController->addArticle($_POST);
                }
                else if ($_GET['route'] === 'adminHome') {
                    $this->backController->adminHome();
                }
                else if ($_GET['route'] === 'adminLogin') {
                    $this->backController->adminLogin();
                }
                else if ($_GET['route'] === 'adminDeconnexion') {
                    $this->backController->adminDeconnexion();
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