<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO {

    public function reportComment($id) {
        $sql = 'UPDATE comment SET is_reported = 1 WHERE id = ?';
        $this->sql($sql, [$id]);
    }

    public function addCommentsFromForm($idArt, $comment) {
        extract($comment);
        if (isset($pseudo, $content) && !empty($pseudo) && !empty($content)) {
            $sql ='INSERT INTO comment (pseudo, content, article_id, date_added) VALUES (?, ?, ?, NOW())';
            $this->sql($sql, [$pseudo, $content, $idArt]);
        }
    }

    public function getCommentsFromArticle($idArt) {
        $sql = 'SELECT id, pseudo, content, date_added, is_reported FROM comment WHERE article_id = ?';
        $result = $this->sql($sql, [$idArt]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function getComments() {
        $sql = 'SELECT id, pseudo, content, date_added, is_reported FROM comment';
        $result = $this->sql($sql);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    private function buildObject(array $row) {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDateAdded($row['date_added']);
        $comment->setIsReported($row['is_reported']);
        return $comment;
    }
}