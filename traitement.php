<?php

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//unset error message
unset($_SESSION['error_message']);
unset($_SESSION['postData']);


$postData = $_POST;

//check if form was submitted
if (!isset($postData['submit'])) {
    header('Location: index.php');
}

//check if all fields are filled and if fields are valid
if (empty($postData['titre'])) {
    $_SESSION['error_message'] = "Le champ 'Titre' est vide.";
    $_SESSION['postData'] = $postData;
    header('Location: ajouter.php?erreur=true');
    exit;
}

if (empty($postData['artiste'])) {
    $_SESSION['error_message'] = "Le champ 'Artiste' est vide.";
    $_SESSION['postData'] = $postData;
    header('Location: ajouter.php?erreur=true');
    exit;
}

if (empty($postData['image']) || !filter_var($postData['image'], FILTER_VALIDATE_URL)) {
    $_SESSION['error_message'] = "Le champ 'Image' est vide ou contient une URL invalide.";
    $_SESSION['postData'] = $postData;
    header('Location: ajouter.php?erreur=true');
    exit;
}

if (empty($postData['description']) || strlen($postData['description']) < 3) {
    $_SESSION['error_message'] = "Le champ 'Description' est vide ou contient moins de 3 caractères.";
    $_SESSION['postData'] = $postData;
    header('Location: ajouter.php?erreur=true');
    exit;
}

//if no error, add oeuvre to database
 else {
    addOeuvre($postData['titre'], $postData['artiste'], $postData['image'], $postData['description']);
    header("refresh:5;url=index.php"); 
    require 'header.html';
    ?>

    <h1>Bravo !</h1>
    <p>Votre oeuvre a bien été ajoutée à la base de données.</p>
    <p>Vous allez être redirigé vers la page d'accueil dans 5 secondes.</p>

    <img src="img\dancing-toothless.gif" alt="Bravo">


<?php 
}
?>