<?php $this->title = "Page de connexion"; ?>
<div class="formLogin">
    <div class="authorComment">
        <h3>Connexion</h3>
    </div>
    <form  method="post">
        <div class="formPseudo">
            <label for="pseudo">Pseudo : </label>
            <input type="text" name="pseudo" id="pseudo">
        </div>
        <div class="formPassword">
            <label for="motdepasse">Mot de passe : </label>
            <input type="password" name="motdepasse" id="motdepasse">
        </div>
        <div class="textButton">
            <input class="buttonLogin" type="submit" value="Se connecter">
        </div>
    </form>
</div>

<div class="messageLogin">
    <div class="titleMessage">
        <h3>Message d'erreur</h3>
    </div>
    <div class="contentMessage">
    <p><?= $message ?></p>
    </div>
</div>
