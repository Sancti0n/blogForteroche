<?php $this->title = "Page Administrateur"; ?>
<?php
if (isset($_SESSION['add_article'])) {
    echo '<p>'.$_SESSION['add_article'].'<p>';
    unset($_SESSION['add_article']);
}
?>

<table>
    <caption>Gestion des articles</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date d'ajout</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date d'ajout</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach ($articles as $article) {
        ?>
        <tr>
            <td><?= htmlspecialchars($article->getId());?></td>
            <td><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
            <td><?= htmlspecialchars($article->getAuthor());?></td>
            <td><?= htmlspecialchars($article->getDateAdded());?></td>
            <td><a href="../public/index.php?route=updateArticle&idArt=<?= htmlspecialchars($article->getId());?>">Modifier</a></td>
            <td><a href="../public/index.php?route=deleteArticle&idArt=<?= htmlspecialchars($article->getId());?>">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
foreach ($articles as $article) {
?>
    <div class="article">
        <h2>
            <a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?>
            </a>
        </h2>
        <?= ($article->getContent());?>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </div>
    <br>
<?php
}
?>