<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO {

    public function reportComment($id) {
        $sql = 'UPDATE comments SET is_reported = 1 WHERE id = ?';
        $this->sql($sql, [$id]);
    }

    public function getComment($id) {
        $sql = 'SELECT * FROM comments WHERE id = ?';
        $result = $this->sql($sql, [$id]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        }
        else {
            header('Location: ../templates/unknown.php');
        }
    }

    public function deleteComment($id) {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $this->sql($sql, [$id]);
    }

    public function addCommentsFromForm($idArt, $comment) {
        extract($comment);
        if (isset($pseudo, $content) && !empty($pseudo) && !empty($content)) {
            $sql ='INSERT INTO comments (pseudo, content, article_id, date_added) VALUES (?, ?, ?, NOW())';
            $this->sql($sql, [$pseudo, $content, $idArt]);
        }
    }

    public function modifyComment($id, $post) {
        extract($post);
        $sql = 'UPDATE comments SET pseudo = ?, content = ?, is_reported = 0 WHERE id = ?';
        $this->sql($sql, [$pseudo, $content, $id]);
    }

    public function getCommentsFromArticle($idArt) {
        $sql = 'SELECT id, pseudo, content, date_added, is_reported FROM comments WHERE article_id = ?';
        $result = $this->sql($sql, [$idArt]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function getComments() {
        $sql = 'SELECT id, pseudo, content, date_added, is_reported, article_id FROM comments';
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