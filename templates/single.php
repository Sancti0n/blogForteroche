<?php $this->title = $article->getTitle(); ?>
<div class="article">
    <div class="title">
        <h2>
            <a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?>
            </a>
        </h2>
    </div>
    <div class="articleText">
        <?= $article->getContent();?>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p><span class="icon-calendar"></span> <?= htmlspecialchars($article->getDateAdded());?></p>
    </div>
</div>
<br>
<div class="comments">
    <div class="commentHeader">
        <h3><span class="icon-bubble"></span> Commentaires</h3>
    </div>
    <?php
    foreach ($comments as $comment) {
    ?>
    <div class="commentText">
        <div>
            <h4 id="<?= htmlspecialchars($comment->getId());?>"><?= htmlspecialchars($comment->getPseudo());?></h4>
            <p><?= htmlspecialchars($comment->getContent());?></p>
            <p><span class="icon-calendar"></span> <?= htmlspecialchars($comment->getDateAdded());?></p>
        </div>
        <div>
            <p class="textButton">
                <a class="buttonReport" href="../public/index.php?route=reportComment&idArt=<?= htmlspecialchars($article->getId());?>&idComment=<?= htmlspecialchars($comment->getId());?>"><span class="icon-flag"></span> Signaler</a> 
            <?php
            if (isset($_SESSION['adminIsLoggued'])) {
            ?>
                <a class="buttonUpdate" href="../public/index.php?route=updateComment&idComment=<?= htmlspecialchars($comment->getId());?>"><span class="icon-edit"></span> Modifier</a> 
                <a class="buttonDelete" href="../public/index.php?route=deleteComment&idComment=<?= htmlspecialchars($comment->getId());?>"><span class="icon-trash-o"></span> Supprimer</a>
            </p>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<div class="formComments">
    <div class="authorComment">
        <h3><span class="icon-commenting"></span> Ajouter un commentaire</h3>
    </div>
    
    <form action="../public/index.php?route=postComment&idArt=<?= $article->getId(); ?>" method="post" class="form">
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
            <br>
            <textarea id="content" name="content"><?php 
                if (isset($post['content'])) {
                    echo $post['content'];
                }
            ?></textarea>
        </div>
        <div class="formSubmit">
            <input type="submit" id="submit" class="buttonSubmit" name="submit" value="Envoyer">
        </div>
    </form>
</div>