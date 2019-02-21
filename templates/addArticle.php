<?php $this->title = "Ajouter un article"; ?>
<div class="formArticle">
    <div class="formTitle">
        <h3>Ajouter un article</h3>
    </div>
    <form class="formAdd" method="post" action="../public/index.php?route=adminAddArticle">
        <div class="titleArticle">
            <label for="title">Titre</label><br>
            <input type="text" id="title" name="title" required value="<?php
            if(isset($post['title'])) {
                echo $post['title'];
            }
            ?>"><br>
        </div>    
        <div class="formContent">
            <label for="content">Contenu</label><br>
            <textarea id="content" class="mceEditor" name="content"><?php 
            if (isset($post['content'])) {
                echo $post['content'];
            }
            ?></textarea><br>
        </div>
        <div class="formAuthor">
            <label for="author">Auteur</label><br>
            <input type="text" id="author" required name="author" value="<?php
            if (isset($post['author'])) {
                echo $post['author'];
            }
            ?>"><br>
        </div>
        <div>
            <input type="submit" id="submit" class="buttonSubmit" name="submit" value="Envoyer">
        </div>
        
    </form>
</div>