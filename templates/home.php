<?php $this->title = "Accueil"; ?>
<p>En construction</p>
<?php
if (isset($_SESSION['add_article'])) {
    echo '<p>'.$_SESSION['add_article'].'<p>';
    unset($_SESSION['add_article']);
}
?>
<a href="../public/index.php?route=adminLogin">Se connecter</a><br>
<?php
foreach ($articles as $article) {
?>
    <div class="article">
        <h2>
            <a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>">
                <?= htmlspecialchars($article->getTitle());?>
            </a>
        </h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </div>
    <br>
<?php
}
?>
