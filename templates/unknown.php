<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title = "Page inconnue";
$contents = "<div class=\"pageError\"><div class=\"titleError\">
<h3>Erreur</h3>
</div><div class=\"textError\">Page inconnue</div></div>";
require '../templates/base.php';