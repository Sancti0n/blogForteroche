<header>
    <h1>Le blog de Jean Forteroche</h1>
    <h2>Acteur & Écrivain</h2>
    <p><a href="../public/index.php">Accueil</a></p>
    <?php
    if (isset($_SESSION['adminIsLoggued'])) {
        ?>
        <p class="login"><?= $_SESSION['adminIsLoggued']?></p>
        <p>
            <a href="../public/index.php?route=adminHome">Administration</a>
            <a href="../public/index.php?route=adminAddArticle">Ajouter un article</a>
            <a href="../public/index.php?route=adminDeconnexion">Déconnexion</a>
        </p>
    <?php
    }
    else {
        ?>
        <p class="connexion">
            <a href="../public/index.php?route=adminLogin">Se connecter</a>
        </p>
    <?php
    }
    ?>
</header>
