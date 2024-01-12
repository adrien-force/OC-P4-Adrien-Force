<?php

require 'bdd.php';

$postData = $_POST;

//check if form was submitted
if (!isset($postData['submit'])) {
    header('Location: index.php');
}

//check if all fields are filled
if (empty($postData['titre']) || empty($postData['artiste']) || empty($postData['image']) || empty($postData['description'])) {
    unset($postData['submit']);
    header('Location: ajouter.php?erreur=true');
}

//check if image is valid
if (!filter_var($postData['image'], FILTER_VALIDATE_URL)) {
    unset($postData['submit']);
    header('Location: ajouter.php?erreur=true');
}

//check if description is valid
if (strlen($postData['description']) < 3) {
    unset($postData['submit']);
    header('Location: ajouter.php?erreur=true');
}

else {
    $titre = htmlspecialchars($postData['titre']);
    $artiste = htmlspecialchars($postData['artiste']);
    $image = htmlspecialchars($postData['image']);
    $description = htmlspecialchars($postData['description']);

    $sql = "INSERT INTO oeuvres (titre, artiste, image, description) VALUES (:titre, :artiste, :image, :description)";
    $statement = $mysqlClient->prepare($sql);
    $statement->execute([
        ':titre' => $titre,
        ':artiste' => $artiste,
        ':image' => $image,
        ':description' => $description
    ]);
    header("refresh:5;url=index.php"); 
    require 'header.php';
    ?>

    <h1>Bravo !</h1>
    <p>Votre oeuvre a bien été ajoutée à la base de données.</p>
    <p>Vous allez être redirigé vers la page d'accueil dans 5 secondes.</p>

    <img class="success-gif" src="img\dancing-toothless.gif" alt="Bravo">


<?php 
}
?>