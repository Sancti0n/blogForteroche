<?php $this->title = "Page Administrateur"; ?>
<a href="../public/index.php?route=adminAddArticle">Ajouter un article</a>
<?php
foreach ($articles as $article) {
?>
    <div class="article">
        <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </div>
    <br>
<?php
}
?>