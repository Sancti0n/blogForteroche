<?php $this->title = "Ajouter un article"; ?>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=adminAddArticle">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?php
            if(isset($post['title'])) {
                echo $post['title'];
            }
            ?>"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content">
            <?php 
            if (isset($post['content'])) {
                echo $post['content'];
            }
            ?>
        </textarea><br>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author" value="<?php
            if (isset($post['author'])) {
                echo $post['author'];
            }
        ?>"><br>
        <input type="submit" id="submit" name="submit" value="Envoyer">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>