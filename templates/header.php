<nav>
    <div><span class="icon-book"></span> Jean Forteroche</div>
    <div>
        <a href="../public/index.php" class="button"><span class="icon-home"></span> Accueil</a>
        <?php
        if (isset($_SESSION['adminIsLoggued'])) {
        ?>
        <a href="../public/index.php?route=adminHome" class="button"><span class="icon-user-check"></span> Administration</a>
        <a href="../public/index.php?route=adminAddArticle" class="button"><span class="icon-plus-square"></span> Ajouter un article</a>
        <a href="../public/index.php?route=adminDeconnexion" class="button"><span class="icon-power-off"></span> Déconnexion</a>
        <?php
        }
        ?>
    </div>
    <div>
        <?php
        if (isset($_SESSION['adminIsLoggued'])) {
        ?>
        <span class="icon-check-square-o"></span> <?= $_SESSION['adminIsLoggued'] ?>
        <?php
        }
        else {
        ?>
        <a href="../public/index.php?route=adminLogin"><span class="icon-sign-in"></span> Se connecter</a>
        <?php
        }
        ?>
    </div>
</nav>