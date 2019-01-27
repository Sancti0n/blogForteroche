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
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($post);
            $_SESSION['add_article'] = 'Le nouvel article a bien été ajouté';
            header('Location: ../public/index.php');
        }
        $this->view->render('add_article', [
            'post' => $post
        ]);
    }

    private static function verification($nom, $pass) {
        //dev.php Connexion SQL

        $db_connexion = new PDO(DB_HOST, DB_USER, DB_PASS);

        //Requête SQL de chargement des informations du compte
        $result = $db_connexion->query(sprintf("SELECT id_admin, pseudo, pass FROM membres_admin WHERE pseudo = %s", $db_connexion->quote($nom)));
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (empty($row)) {
            //Aucun utilisateur trouvé en BDD avec ce login
            return false;
        }
        if (!password_verify($pass, $row['pass'])) {
            //La fonction password_verify() indique false
            //Cela signifie que le mot de passe saisi n'est pas identique à celui en base
            return false;
        }
        return true;
        }

    public function adminLogin() {
        //Si on a reçu les données d'un formulaire :
        if (isset($_POST['pseudo']) && isset($_POST['motdepasse'])) {
        $nom = $_POST['pseudo'];
        $motdepasse = $_POST['motdepasse'];

        //On teste si le mot de passe est valide :
        if (self::verification($nom, $motdepasse)) {
            //Le mot de passe est valide, l'utilisateur est identifié
            //On change d'identifiant de session
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
            $message = 'le login ou le mot de passe est vide';
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
}

