<?php $this->title = "Administration"; ?>
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
<table>
    <caption id="manageComment">Gestion des commentaires signalés</caption>
    <thead>
        <tr>
            <th>Booléen</th>
            <th>ID</th>
            <th>Auteur</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Booléen</th>
            <th>ID</th>
            <th>Auteur</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </tfoot>
    <tbody>
    
    <?php
    foreach ($comments as $comment) {
    ?>
    <?php
        if ($comment->getIsReported() === '1') {
        ?>
        <tr>
            <td><?= $comment->getIsReported(); ?></td>
            <td><?= $comment->getId(); ?></td>
            <td><?= $comment->getPseudo(); ?></td>
            <td><a href="../public/index.php?route=updateComment&idComment=<?= htmlspecialchars($comment->getId());?>">Modifier</a></td>
            <td><a href="../public/index.php?route=deleteComment&idComment=<?= htmlspecialchars($comment->getId());?>">Supprimer</a></td>
        <?php
        }
        ?>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>     

