<?php $this->title = "Modifier un commentaire"; ?>
<div id="formComments">
    <h3>Ajouter un commentaire</h3>
    <?php
    //var_dump($comment);
    //die();
    ?>
    <form class="" method="post" action="../public/index.php?route=updateComment&idComment=<?= $comment->getId(); ?>">
        <div class="formPseudo">
            <label for="pseudo">Votre pseudo</label>
            <input type="text" name="pseudo" id="pseudo" required value="<?php
                echo $comment->getPseudo();
            ?>">
        </div>
        <div class="formContent">
            <label for="content">Votre commentaire</label>
            <textarea id="content" name="content"><?php 
                echo $comment->getContent();
            ?></textarea>
        </div>
        <div class="form-example">
            <input type="submit" id="submit" name="submit" value="Envoyer">
        </div>
    </form>
</div>