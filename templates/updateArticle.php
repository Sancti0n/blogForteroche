<?php $this->title = "Modifier un article"; ?>
<div class="formArticle">
    <div class="formTitle">
        <h3>Modifier un article</h3>
    </div>
    <form class="formAdd" method="post" action="../public/index.php?route=updateArticle&idArt=<?= htmlspecialchars($article->getId()); ?>">
        <div class="titleArticle">    
            <label for="title">Titre</label><br>
            <input type="text" id="title" name="title" required value="<?= htmlspecialchars($article->getTitle()); ?>"><br>
        </div>
        <div class="formContent">
            <label for="content">Contenu</label><br>
            <textarea id="content" class="mceEditor" name="content"><?= $article->getContent(); ?></textarea><br>
        </div>
        <div class="formAuthor">
            <label for="author">Auteur</label><br>
            <input type="text" id="author" required name="author" value="<?= htmlspecialchars($article->getAuthor()); ?>"><br>
        </div>
        <div>
            <input type="submit" id="submit" class="buttonSubmit" name="submit" value="Envoyer">
        </div>
    </form>
</div>