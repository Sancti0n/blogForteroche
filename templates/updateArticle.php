<?php $this->title = "Modifier un article"; ?>
<div class="formArticle">
    <form class="" method="post" action="../public/index.php?route=updateArticle&idArt=<?= $article->getId(); ?>" >
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" required value="<?php
            echo $article->getTitle();
            ?>"><br>

        <label for="content">Contenu</label><br>
        <textarea id="content" class="mceEditor" name="content"><?php 
            echo $article->getContent();
        ?></textarea><br>

        <label for="author">Auteur</label><br>
        <input type="text" id="author" required name="author" value="<?php
            echo $article->getAuthor();
        ?>"><br>
        <input type="submit" id="submit" name="submit" value="Envoyer">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>