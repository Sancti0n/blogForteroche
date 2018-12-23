<?php

namespace App\config;

class Router {
	public function run() {
		try {
			if (isset($_GET['route'])) {
				if ($_GET['route'] === 'article') {
					$idArt = $_GET['idArt'];
					require '../templates/single.php';
				}
				else {
					echo 'Page inconnue';
				}
			}
			else {
				require '../templates/home.php';
			}
		}
		catch (Exception $e) {
			echo 'Erreur';
		}
	}
}