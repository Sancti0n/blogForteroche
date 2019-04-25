<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/icomoon/style.css">
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=233q90o6e689gjqe2uepkf9b5zellqympx6sz92yrpaiu5s5"></script> 
    <!--<script src="../public/js/tinymce/tinymce.js"></script>-->
    <script>
  tinymce.init({
    selector: '.mcEditor'
  });
  </script>
    <title><?= $title ?></title>
<body>
    <?php
    require '../templates/header.php';
    ?>
    <div id="contents"><?= $contents ?>
    <?php
    require '../templates/footer.php';
    if (isset($_SESSION['adminIsLoggued'])) {
    ?>
        
    <?php 
    }
    ?>
</body>
</html>