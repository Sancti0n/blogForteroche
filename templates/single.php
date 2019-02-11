<?php $this->title = "Article"; ?>
<div class="article">
<?php var_dump($article);
    
    ?>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    
    <p><?= $article->getContent();?>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
</div>
<br>
<a href="../public/index.php">Retour à la liste des articles</a>
<div id="comments" class="text-left">
    <h3>Commentaires</h3>
    <?php
    foreach ($comments as $comment) {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getDateAdded());?></p>
        <?php
    }
    ?>
</div>
<div id="formComments">
    <h3>Ajouter un commentaire</h3>
    <form action="../public/index.php?route=postComment&idArt=<?= $article->getId(); ?>" method="post" id="">
        <div class="formPseudo">
            <label for="pseudo">Votre pseudo</label>
            <input type="text" name="pseudo" id="pseudo" required value="<?php
                if(isset($post['pseudo'])) {
                    echo $post['pseudo'];
                }
            ?>">
        </div>
        <div class="formContent">
            <label for="content">Votre commentaire</label>
            <textarea id="content" name="content"><?php 
                if (isset($post['content'])) {
                    echo $post['content'];
                }
            ?></textarea>
        </div>
        <div class="form-example">
            <input type="submit" id="submit" name="submit" value="Envoyer">
        </div>
    </form>
</div>