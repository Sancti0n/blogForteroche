<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title = "Page inconnue";
$contents = "<p id=\"errorPage\">Page inconnue</p>";
require '../templates/base.php';