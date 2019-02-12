<?php
namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;

use App\src\model\View;
use PDO;

class BackController {

    private $view;

    public function __construct() {
        $this->view = new View();
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
    }

    public function addArticle($post) {
        if (isset($post['submit']) && !empty($post['title']) && !empty($post['content']) && !empty($post['author'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($post);
            $_SESSION['add_article'] = 'Le nouvel article a bien été ajouté';
            header('Location: ../public/index.php?route=adminHome');
        }
        $this->view->render('add_article', [
            'post' => $post,
        ]);
    }

    public function updateArticle($idArt) {
        if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->modifyArticle($idArt, filter_input_array(INPUT_POST));
            $_SESSION['update_article'] = 'Un article a été modifié';
            header('Location: ../public/index.php?route=adminHome');
        }
        $articleDAO = new ArticleDAO();
        $articleDAO->getArticle($idArt);
        $article = $articleDAO->getArticle($idArt);
        $this->view->render('updateArticle', [
            'post' => $_POST,
            'article' => $article
        ]);
    }

    public function deleteArticle($idArt) {
        $articleDAO = new ArticleDAO();
        $articleDAO->deleteArticle($idArt);
        $_SESSION['delete_article'] = 'Un article a été supprimé';
        header('Location: ../public/index.php?route=adminHome');
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
            'articles' => $this->articleDAO->getArticles(),
            'comments' => $this->commentDAO->getComments()
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
        header('Location: ../public/index.php');
    }
}