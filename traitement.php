<?php

require 'db_connection.php';
require 'oeuvreManager.php';

$postData = $_POST;

//check if form was submitted
if (!isset($postData['submit'])) {
    header('Location: index.php');
}

//check if all fields are filled and if fields are valid
if (empty($postData['titre']) || empty($postData['artiste']) || empty($postData['image']) || empty($postData['description']) || (!filter_var($postData['image'], FILTER_VALIDATE_URL)) || (strlen($postData['description']) < 3) ) {
    unset($postData['submit']);
    header('Location: ajouter.php?erreur=true');
}

else {
    addOeuvre($postData['titre'], $postData['artiste'], $postData['image'], $postData['description']);
    header("refresh:5;url=index.php"); 
    require 'header.php';
    ?>

    <h1>Bravo !</h1>
    <p>Votre oeuvre a bien été ajoutée à la base de données.</p>
    <p>Vous allez être redirigé vers la page d'accueil dans 5 secondes.</p>

    <img src="img\dancing-toothless.gif" alt="Bravo">


<?php 
}
?>