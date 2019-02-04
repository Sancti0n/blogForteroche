<header>
    <h1>Le blog de Jean Forteroche</h1>
    <h2>Acteur & Écrivain</h2>
    <p><a href="../public/index.php">Accueil</a></p>
    <?php
    if (isset($_SESSION['adminIsLoggued'])) {
        echo "<p class=\"login\">".$_SESSION['adminIsLoggued']."</p>\n";
        echo "<p><a href=\"../public/index.php?route=adminHome\">Administration</a> - <a href=\"../public/index.php?route=adminAddArticle\">Ajouter un article</a> - <a href=\"../public/index.php?route=adminDeconnexion\">Déconnexion</a></p>";
    }
    else {
        echo "<p class=\"connexion\"><a href=\"../public/index.php?route=adminLogin\">Se connecter</a></p>";
    }
    ?>
</header>
