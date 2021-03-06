tinymce.init({
    mode: "specific_textareas",
    editor_selector: "mceEditor",
    height: "300",
    width: "100%",
    language: "fr_FR",
    language_url: "http://localhost/projets_oc/projet_4/public/js/tinymce/langs/fr_FR.js",
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ]
});