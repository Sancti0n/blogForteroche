<?php $this->title = "Accueil"; ?>
<?php
if (isset($_SESSION['add_article'])) {
    echo '<p>'.$_SESSION['add_article'].'<p>';
    unset($_SESSION['add_article']);
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
