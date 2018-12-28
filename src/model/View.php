<?php

namespace App\src\model;

class View {

	private $file;
	private $title;

	public function render($template, $data = []) {
		$this->file = '../templates/' . $template . '.php';
		$content = $this->renderfile($this->file, $data);
		$view = $this->renderfile('../templates/base.php', [
			'title' => $this->title,
			'content' => $content
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