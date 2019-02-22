<?php $this->title = "Administration"; ?>
<?php
if (isset($_SESSION['add_article'])) {
?>
<div class="messageLogin">
    <div class="titleMessage">
        <h3>Ajout d'un article</h3>
    </div>
    <div class="contentMessage">
        <p><?= $_SESSION['add_article']; ?><p>
        <?php unset($_SESSION['add_article']);
}
?>
    </div>
</div>

<table class="manageArticle">
    <caption class="titleManage">Gestion des articles</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>URL Article</th>
            <th>Auteur</th>
            <th>Date d'ajout</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>URL Article</th>
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
            <td><a class="urlTitle" href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
            <td><?= htmlspecialchars($article->getAuthor());?></td>
            <td><?= htmlspecialchars($article->getDateAdded());?></td>
            <td><a class="buttonUpdate" href="../public/index.php?route=updateArticle&idArt=<?= htmlspecialchars($article->getId());?>"><span class="icon-edit"></span> Modifier</a></td>
            <td><a class="buttonDelete" href="../public/index.php?route=deleteArticle&idArt=<?= htmlspecialchars($article->getId());?>"><span class="icon-trash-o"></span> Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<table class="manageComment">
    <?php
    $hasReportedComment = null;
    foreach ($comments as $comment) {
        if ($comment->getIsReported() === '1') {
            $hasReportedComment = true;
        }
    }
    if ($hasReportedComment) {
        ?>
        <caption class="titleManage">Gestion des commentaires signalés</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>Auteur</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Auteur</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach ($comments as $comment) {
            if ($comment->getIsReported() === '1') {
                ?>
                <tr>
                    <td><?= $comment->getId(); ?></td>
                    <td><?= $comment->getPseudo(); ?></td>
                    <td><a class="buttonUpdate" href="../public/index.php?route=updateComment&idComment=<?= htmlspecialchars($comment->getId());?>"><span class="icon-edit"></span> Modifier</a></td>
                    <td><a class="buttonDelete" href="../public/index.php?route=deleteComment&idComment=<?= htmlspecialchars($comment->getId());?>"><span class="icon-trash-o"></span> Supprimer</a></td>
                <?php
                }
                ?>
                </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>