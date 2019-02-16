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
                    if (isset($_GET['idArt'])) {
                        $this->frontController->article($_GET['idArt']);
                    }
                    else {
                        $this->errorController->unknown();
                    }
                }
                else if ($_GET['route'] === 'reportComment') {
                    $this->frontController->reportComment($_GET['idComment'], $_GET['idArt']);
                }
                else if ($_GET['route'] === 'postComment') {
                    $this->frontController->addCommentsFromForm($_GET['idArt'], $_POST);
                }
                else if ($_GET['route'] === 'updateComment') {
                    if (!isset($_SESSION['adminIsLoggued'])) {
                        header('Location: ../public/index.php?route=adminLogin');
                    }
                    else {
                        $this->backController->updateComment($_GET['idComment']);
                    }
                }
                else if ($_GET['route'] === 'updateArticle') {
                    if (!isset($_SESSION['adminIsLoggued'])) {
                        header('Location: ../public/index.php?route=adminLogin');
                    }
                    else {
                        $this->backController->updateArticle($_GET['idArt']);
                    }
                }
                else if ($_GET['route'] === 'deleteComment') {
                    if (!isset($_SESSION['adminIsLoggued'])) {
                        header('Location: ../public/index.php?route=adminLogin');
                    }
                    else {
                        $this->backController->deleteComment($_GET['idComment']);
                    }
                }

                else if ($_GET['route'] === 'deleteArticle') {
                    if (!isset($_SESSION['adminIsLoggued'])) {
                        header('Location: ../public/index.php?route=adminLogin');
                    }
                    else {
                        $this->backController->deleteArticle($_GET['idArt']);
                    }
                }
                else if ($_GET['route'] === 'adminAddArticle') {
                    if (!isset($_SESSION['adminIsLoggued'])) {
                        header('Location: ../public/index.php?route=adminLogin');
                    }
                    else {
                        $this->backController->addArticle($_POST);
                    }
                    
                }
                else if ($_GET['route'] === 'adminHome') {
                    if (!isset($_SESSION['adminIsLoggued'])) {
                        header('Location: ../public/index.php?route=adminLogin');
                    }
                    else {
                        $this->backController->adminHome();
                    }
                }
                else if ($_GET['route'] === 'adminDeconnexion') {
                    if (!isset($_SESSION['adminIsLoggued'])) {
                        header('Location: ../public/index.php?route=adminLogin');
                    }
                    else {
                        $this->backController->adminDeconnexion();
                    }
                }
                else if ($_GET['route'] === 'adminLogin') {
                    if (isset($_SESSION['adminIsLoggued'])) {
                        header('Location: ../public/index.php?route=adminHome');
                    }
                    else {
                        $this->backController->adminLogin();
                    }
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