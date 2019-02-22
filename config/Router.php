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
                        $this->frontController->article(filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT));
                        $_SESSION['route'] = $_SERVER['QUERY_STRING'];
                    }
                    else {
                        $this->errorController->unknown();
                    }
                }
                else if ($_GET['route'] === 'reportComment') {
                    $this->frontController->reportComment(filter_input(INPUT_GET, 'idComment', FILTER_SANITIZE_NUMBER_INT), filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT));
                }
                else if ($_GET['route'] === 'postComment') {
                    $this->frontController->addCommentsFromForm(filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT), filter_input_array(INPUT_POST));
                }
                else if ($_GET['route'] === 'updateComment') {
                    $this->backController->updateComment(filter_input(INPUT_GET, 'idComment', FILTER_SANITIZE_NUMBER_INT));
                }
                else if ($_GET['route'] === 'updateArticle') {
                    $this->backController->updateArticle(filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT));
                }
                else if ($_GET['route'] === 'deleteComment') {
                    $this->backController->deleteComment(filter_input(INPUT_GET, 'idComment', FILTER_SANITIZE_NUMBER_INT));
                }
                else if ($_GET['route'] === 'deleteArticle') {
                    $this->backController->deleteArticle(filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT));
                    $_SESSION['route'] = $_SERVER['QUERY_STRING'];
                }
                else if ($_GET['route'] === 'adminAddArticle') {
                    $this->backController->addArticle(filter_input_array(INPUT_POST));
                }
                else if ($_GET['route'] === 'adminHome') {
                    $this->backController->adminHome();
                    $_SESSION['route'] = $_SERVER['QUERY_STRING'];
                }
                else if ($_GET['route'] === 'adminDeconnexion') {
                    $this->backController->adminDeconnexion();
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