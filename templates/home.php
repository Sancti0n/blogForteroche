<?php $this->title = "Accueil"; ?>
<?php
if (isset($_SESSION['add_article'])) {
?>
<div class="messageLogin">
    <div class="titleMessage">
        <h3>Ajout d'un article</h3>
    </div>
    <div class="contentMessage">
        <p><?= $_SESSION['add_article']; ?><p>
        <?php unset($_SESSION['add_article']);?>
    </div>
</div>
<?php
}
?>

<?php
foreach ($articles as $article) {
?>
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
<?php
}
?>
