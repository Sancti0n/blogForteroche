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

    public static function adminIsLoggued() {
        if (!isset($_SESSION['adminIsLoggued'])) {
            header('Location: ../public/index.php?route=adminLogin');
            exit();
        }
    }

    public function deleteComment($idComment) {
        self::adminIsLoggued();
        $commentDAO = new CommentDAO();
        $commentDAO->deleteComment($idComment);
        header('Location: ../public/index.php?'.$_SESSION['route']);
    }

    public function updateComment($idComment) {
        self::adminIsLoggued();
        $submitComment = filter_input(INPUT_POST, "submit", FILTER_SANITIZE_STRING);
        $pseudoComment = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
        $contentComment = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);
        if (isset($submitComment) && $pseudoComment && $contentComment) {
            $commentDAO = new CommentDAO();
            $commentDAO->modifyComment($idComment, filter_input_array(INPUT_POST));
            header('Location: ../public/index.php?'.$_SESSION['route']);
        }
        $commentDAO = new CommentDAO();
        $commentDAO->getComment($idComment);
        $comment = $commentDAO->getComment($idComment);
        $this->view->render('updateComment', [
            'post' => filter_input_array(INPUT_POST),
            'comment' => $comment
        ]);
    }

    public function addArticle($post) {
        self::adminIsLoggued();
        if (isset($post['submit']) && 
            !empty($post['title']) && 
            !empty($post['content']) && 
            !empty($post['author'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($post);
            $_SESSION['add_article'] = 'Le nouvel article a bien été ajouté';
            header('Location: ../public/index.php?route=adminHome');
        }
        $this->view->render('addArticle', [
            'post' => $post,
        ]);
    }

    public function updateArticle($idArt) {
        self::adminIsLoggued();
        $submitArticle = filter_input(INPUT_POST, "submit", FILTER_SANITIZE_STRING);
        $titleArticle = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $contentArticle = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);
        $authorArticle = filter_input(INPUT_POST, "author", FILTER_SANITIZE_STRING);
        if (isset($submitArticle) && $titleArticle && $contentArticle && $authorArticle) {
            $articleDAO = new ArticleDAO();
            $articleDAO->modifyArticle($idArt, filter_input_array(INPUT_POST));
            header('Location: ../public/index.php?route=adminHome');
        }
        $articleDAO = new ArticleDAO();
        $articleDAO->getArticle($idArt);
        $article = $articleDAO->getArticle($idArt);
        $this->view->render('updateArticle', [
            'post' => filter_input_array(INPUT_POST),
            'article' => $article
        ]);
    }

    public function deleteArticle($idArt) {
        self::adminIsLoggued();
        $articleDAO = new ArticleDAO();
        $articleDAO->deleteArticle($idArt);
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
        $nom = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
        $motdepasse = filter_input(INPUT_POST, "motdepasse", FILTER_SANITIZE_STRING);
        if (isset($nom) && isset($motdepasse)) {
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
        self::adminIsLoggued();
        $this->view->render('adminHome', [
            'articles' => $this->articleDAO->getArticles(),
            'comments' => $this->commentDAO->getComments()
        ]);
    }

    public function adminDeconnexion() {
        self::adminIsLoggued();
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