<?php
namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\model\View;
use PDO;

class BackController {

    private $view;

    public function __construct() {
        $this->view = new View();
        $this->articleDAO = new ArticleDAO();
    }

    public function addArticle($post) {
        if (!isset($_SESSION['adminIsLoggued'])) {
            header('Location: ../public/index.php?route=adminLogin');
        }
        if (isset($post['submit'])) {
            if (isset($title, $content, $author) && !empty($title) && !empty($content) && !empty($author)) {
                $articleDAO = new ArticleDAO();
                $articleDAO->addArticle($post);
                $_SESSION['add_article'] = 'Le nouvel article a bien été ajouté';
                header('Location: ../public/index.php?route=adminHome');
            }
        }
        $this->view->render('add_article', [
            'post' => $post
        ]);
    }

    private static function verification($nom, $pass) {
        $db_connexion = new PDO(DB_HOST, DB_USER, DB_PASS);
        $result = $db_connexion->query(sprintf("SELECT id_admin, pseudo, pass FROM membres_admin WHERE pseudo = %s", $db_connexion->quote($nom)));
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (empty($row)) {
            return false;
        }
        if (!password_verify($pass, $row['pass'])) {
            return false;
        }
        return true;
    }

    public function adminLogin() {
        if (isset($_SESSION['adminIsLoggued'])) {
            header('Location: ../public/index.php?route=adminHome');
        }
        if (isset($_POST['pseudo']) && isset($_POST['motdepasse'])) {
            $nom = $_POST['pseudo'];
            $motdepasse = $_POST['motdepasse'];

            if (self::verification($nom, $motdepasse)) {
                session_regenerate_id();
                $_SESSION['adminIsLoggued'] = $nom;
                header('Location: ../public/index.php?route=adminHome');
            }
            else {
                $message = 'Mauvais mot de passe';
                $this->view->render('adminLogin', [
                    'message' => $message
                ]);
            }
        }
        else {
            $message = 'Le login ou le mot de passe est vide';
            $this->view->render('adminLogin', [
                'message' => $message
            ]);
        }
    }

    public function adminHome() {
        $this->view->render('adminHome', [
            'articles' => $this->articleDAO->getArticles()
        ]);
    }

    public function adminDeconnexion() {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(), 
                '', 
                time() - 42000,
                $params["path"], 
                $params["domain"],
                $params["secure"], 
                $params["httponly"]
            );
        }
        session_destroy();
        header('location: ../public/index.php');
    }
}

