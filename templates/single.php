<?php $this->title = htmlspecialchars($article->getTitle()); ?>
<div class="article">
    <div class="title">
        <h2>
            <?= htmlspecialchars($article->getTitle());?>
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

<?php
$haveComment = null;
    foreach ($comments as $comment) {
        if (htmlspecialchars($comment->getIsReported()) === '1' || htmlspecialchars($comment->getIsReported()) === '0') {
            $haveComment = true;
        }
    }
    if ($haveComment) {
    ?>

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
        <div class="textButton">
            <a class="buttonReport" href="../public/index.php?route=reportComment&idArt=<?= htmlspecialchars($article->getId());?>&idComment=<?= htmlspecialchars($comment->getId());?>"><span class="icon-flag"></span> Signaler</a> 
            <?php
            if (isset($_SESSION['adminIsLoggued'])) {
            ?>
            <a class="buttonUpdate" href="../public/index.php?route=updateComment&idComment=<?= htmlspecialchars($comment->getId());?>"><span class="icon-edit"></span> Modifier</a> 
            <a class="buttonDelete" href="../public/index.php?route=deleteComment&idComment=<?= htmlspecialchars($comment->getId());?>"><span class="icon-trash-o"></span> Supprimer</a>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    }
}
?>
</div>
<div class="formComments">
    <div class="authorComment">
        <h3><span class="icon-commenting"></span> Ajouter un commentaire</h3>
    </div>
    <form action="../public/index.php?route=postComment&idArt=<?= htmlspecialchars($article->getId()); ?>" method="post" class="form">
        <div class="formPseudo">
            <label for="pseudo">Votre pseudo</label>
            <input type="text" name="pseudo" id="pseudo" required value="<?php
                if(isset($post['pseudo'])) {
                    echo filter_var($post['pseudo'], FILTER_SANITIZE_STRING);
                }
            ?>">
        </div>
        <div class="formContent">
            <label for="content">Votre commentaire</label>
            <br>
            <textarea id="content" name="content"><?php 
                if (isset($post['content'])) {
                    echo filter_var($post['content'], FILTER_SANITIZE_STRING);
                }
            ?></textarea>
        </div>
        <div class="formSubmit">
            <input type="submit" id="submit" class="buttonSubmit" name="submit" value="Envoyer">
        </div>
    </form>
</div>