<?php

namespace App\src\model;

class Comment {

    private $id;
    private $pseudo;
    private $content;
    private $date_added;
    private $is_reported;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPseudo() {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDateAdded() {
        return $this->date_added;
    }

    /**
     * @param mixed $dateAdded
     */
    public function setDateAdded($date_added) {
        $this->date_added = $date_added;
    }

    public function getIsReported() {
        return $this->is_reported;
    }

    public function setIsReported($is_reported) {
        $this->is_reported = $is_reported;
    }
}