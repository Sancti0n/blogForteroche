<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <p>Le blog de Jean Forteroche</p>
        <p>Acteur & Écrivain</p>
        <p><a href="../public/index.php">Accueil</a></p>
        <?php
        if (isset($_SESSION['adminIsLoggued'])) {
            echo "<p><a href=\"../public/index.php?route=adminAddArticle\">Ajouter un article</a></p>";
            echo "<p><a href=\"../public/deconnexion.php\">Déconnexion</a></p>";
        }
        ?>
    </header>
    <div id="content">
        <?= $content ?>
    </div>
    <footer>
        <p>Mentions légales</p>
        <p>Si vous désirez me contacter : <a href="mailto:someone@example.com">someone[at]example.com</a>.</p>
    </footer>
</body>
</html>