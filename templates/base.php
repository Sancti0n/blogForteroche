<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
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
    require '../templates/script.php';
    ?>
</body>
</html>