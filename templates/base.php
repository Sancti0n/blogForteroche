<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/icomoon/style.css">
    <title><?= $title ?></title>
<body>
    <?php
    require '../templates/header.php';
    ?>
    <div id="contents">
        <?= $contents ?>
    </div>
    <?php
    require '../templates/footer.php';
    if (isset($_SESSION['adminIsLoggued'])) {
    ?>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=233q90o6e689gjqe2uepkf9b5zellqympx6sz92yrpaiu5s5'></script>
        <script src="../public/js/tinymce/tinymce.js"></script>
    <?php 
    }
    ?>
</body>
</html>