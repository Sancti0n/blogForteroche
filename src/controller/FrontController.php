<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

class FrontController {

    private $articleDAO;
    private $commentDAO;
    private $view;

    public function __construct() {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function addCommentsFromForm($idArt, $post) {
        if (isset($post['submit']) && !empty($post['pseudo']) && !empty($post['content'])) {
            header('Location: ../public/index.php?route=article&idArt='.$idArt);
            $commentDAO = new CommentDAO();
            $commentDAO->addCommentsFromForm($idArt, $post);
        }
        $this->view->render('single', [
            'post' => $post
        ]);
    }

    public function home() {
        $articles = $this->articleDAO->getArticles();
        $this->view->render('home', [
            'articles' => $articles
        ]);
    }

    public function article($id) {
        $article = $this->articleDAO->getArticle($id);
        $comments = $this->commentDAO->getCommentsFromArticle($id);
        $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }
}