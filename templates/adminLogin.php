<?php $this->title = "Page de connexion"; ?>
<form class="formLogin" method="post">
    <p>
        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" id="pseudo">
    </p>
    <p>
        <label for="motdepasse">Mot de passe : </label>
        <input type="password" name="motdepasse" id="motdepasse">
    </p>
    <p>
        <input class="bouton" type="submit" value="Se connecter">
    </p>
</form>
<?php echo "<p class=\"message\">".$message."</p>\n" ?>