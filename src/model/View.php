<?php

namespace App\src\model;

class View {

    private $file;
    private $title;

    public function render($template, $data = []) {
        $this->file = '../templates/' . $template . '.php';
        $contents = $this->renderfile($this->file, $data);
        $view = $this->renderfile('../templates/base.php', [
            'title' => $this->title,
            'contents' => $contents
        ]);
        echo $view;
    }

    private function renderfile($file, $data) {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            echo 'Fichier inexistant';
        }
    }
}