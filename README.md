Guide d'installation

    Changez le lien absolu dans language_url qui est situé dans tinymce.js, vous devez avoir un domaine 
    pour votre tinymce, pour plus d'informations consultez le site de tinymce.
    Chemin : public\js\tinymce\tinymce.js
    
    Pour la connexion à la base de donnée, modifiez le fichier dev.php selon vos besoins.
    Chemin : config\dev.php
    
Responsive

    Projet totalement responsive, consultez le fichier style.css pour le modifier selon vos besoins.
    Chemin : public\css\style.css


Créez un blog pour un écrivain


Vous développerez une application de blog simple en PHP et avec une base de données MySQL. Elle doit fournir une interface frontend (lecture des billets) et une interface backend (administration des billets pour l'écriture). On doit y retrouver tous les éléments d'un CRUD

    Create : création de billets
    Read : lecture de billets
    Update : mise à jour de billets
    Delete : suppression de billets

Chaque billet doit permettre l'ajout de commentaires, qui pourront être modérés dans l'interface d'administration au besoin.
Les lecteurs doivent pouvoir "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration pour être modérés.

L'interface d'administration sera protégée par mot de passe. La rédaction de billets se fera dans une interface WYSIWYG basée sur TinyMCE, pour que Jean n'ait pas besoin de rédiger son histoire en HTML (on comprend qu'il n'ait pas très envie !).

Vous développerez en PHP sans utiliser de framework pour vous familiariser avec les concepts de base de la programmation. Le code sera construit sur une architecture MVC. Vous développerez autant que possible en orienté objet (au minimum, le modèle doit être construit sous forme d'objet).


Compétences évaluées

    Soutenir et argumenter ses propositions
    Créer un site Internet, de sa conception à sa livraison
    Récupérer les données d’une base
    Récupérer la saisie d’un formulaire utilisateur en langage PHP
    Organiser le code en langage PHP
    Insérer ou modifier les données d’une base
    Construire une base de données
    Analyser les données utilisées par le site ou l’application