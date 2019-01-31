<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <title><?= $title ?></title>
    
    <?php 
    if (isset($_SESSION['adminIsLoggued'])) {
        echo "<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=233q90o6e689gjqe2uepkf9b5zellqympx6sz92yrpaiu5s5'></script>";
        echo "<script>
        tinymce.init({
            mode : 'specific_textareas',
            editor_selector : 'mceEditor',
            height : '300',
            width : '790',
            language: 'fr_FR',
            language_url: 'http://localhost/projets_oc/projet_4/public/js/tinymce/langs/fr_FR.js',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ]
        });
        </script>";
    }
    ?>
    
    <script>
        function contents() {
            var content = tinyMCE.get('content').getContent();
            //$('#TRUC').text(content);
            //console.log(content);
        }
    </script>
</head>
<body>
    <header>
        <h1>Le blog de Jean Forteroche</h1>
        <h2>Acteur & Écrivain</h2>
        <p><a href="../public/index.php">Accueil</a></p>
        <?php
        if (isset($_SESSION['adminIsLoggued'])) {
            echo "<p class=\"login\">".$_SESSION['adminIsLoggued']."</p>\n";
            echo "<p><a href=\"../public/index.php?route=adminAddArticle\">Ajouter un article</a> 
                <a href=\"../public/index.php?route=adminDeconnexion\">Déconnexion</a></p>";
        }
        else {
            echo "<p class=\"connexion\"><a href=\"../public/index.php?route=adminLogin\">Se connecter</a></p>";
        }
        ?>
    </header>
    <?php 
    if (isset($erreur)) {
        echo "<p class=\"emptyForm\">TEST :".$erreur."</p>\n";
    }
    ?>
    <div id="contents">
        <?= $contents ?>
    </div>
    <footer>
        <p>Mentions légales</p>
        <p>Si vous désirez me contacter : <a href="mailto:">someone[at]example.com</a></p>
    </footer>
    
    <script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
    </script>
    
</body>
</html>