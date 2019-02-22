<?php $this->title = "Modifier un commentaire"; ?>
<div class="formComments">
    <div class="authorComment">
        <h3><span class="icon-commenting"></span> Modifier un commentaire</h3>
    </div>
    <form method="post" class="form" action="../public/index.php?route=updateComment&idComment=<?= htmlspecialchars($comment->getId()); ?>">
        <div class="formPseudo">
            <label for="pseudo">Le pseudo</label>
            <input type="text" name="pseudo" id="pseudo" required value="<?= htmlspecialchars($comment->getPseudo()); ?>">
        </div>
        <div class="formContent">
            <label for="content">Le commentaire</label>
            <br>
            <textarea id="content" name="content"><?= htmlspecialchars($comment->getContent()); ?></textarea>
        </div>
        <div class="formSubmit">
            <input type="submit" id="submit" class="buttonSubmit" name="submit" value="Envoyer">
        </div>
    </form>
</div>