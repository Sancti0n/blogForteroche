<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;

class FrontController {

	private $articleDAO;
	private $commentDAO;

	public function __construct() {
		$this->articleDAO = new ArticleDAO();
		$this->commentDAO = new CommentDAO();
	}

	public function home() {
		$article = $this->articleDAO->getArticles();
		//$article = new ArticleDAO();
        //$articles = $article->getArticles();
		require '../templates/home.php';
	}

	public function article($idArt) {
		$articles = $this->articleDAO->getArticle($idArt);
		$comments = $this->commentDAO->getCommentsFromArticle($idArt);
		//$article = new ArticleDAO();
		//$article = $article->getArticles($idArt);
		//$comment = new CommentDAO();
		//$comments = $comment->getCommentsFromArticle($idArt);
		require '../templates/single.php';
	}
}