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
            $route = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING);
            if (isset($route)) {
                if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'article') {
                    $idArticle = filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT);
                    if ($idArticle) {
                        $this->frontController->article(filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT));
                        $_SESSION['route'] = filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING);
                    }
                    else {
                        $this->errorController->unknown();
                    }
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'reportComment') {
                    $this->frontController->reportComment(filter_input(INPUT_GET, 'idComment', FILTER_SANITIZE_NUMBER_INT), filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT));
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'postComment') {
                    $this->frontController->addCommentsFromForm(filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT), filter_input_array(INPUT_POST));
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'updateComment') {
                    $this->backController->updateComment(filter_input(INPUT_GET, 'idComment', FILTER_SANITIZE_NUMBER_INT));
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'updateArticle') {
                    $this->backController->updateArticle(filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT));
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'deleteComment') {
                    $this->backController->deleteComment(filter_input(INPUT_GET, 'idComment', FILTER_SANITIZE_NUMBER_INT));
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'deleteArticle') {
                    $this->backController->deleteArticle(filter_input(INPUT_GET, 'idArt', FILTER_SANITIZE_NUMBER_INT));
                    $_SESSION['route'] = filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING);
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'adminAddArticle') {
                    $this->backController->addArticle(filter_input_array(INPUT_POST));
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'adminHome') {
                    $this->backController->adminHome();
                    $_SESSION['route'] = filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING);
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'adminDeconnexion') {
                    $this->backController->adminDeconnexion();
                }
                else if (filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING) === 'adminLogin') {
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