<?php

//Pour toutes les classes dans DAO
namespace App\src\DAO;

class CommentDAO extends DAO {
	public function getCommentsFromArticle($idArt) {
		$sql = 'SELECT id, pseudo, content, date_added FROM comment WHERE article_id = ?';
		$result = $this->sql($sql, [$idArt]);
		return $result;
	}
}