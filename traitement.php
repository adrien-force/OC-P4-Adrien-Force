<?php

require 'bdd.php';

$postData = $_POST;

//check if form was submitted
if (!isset($postData['submit'])) {
    header('Location: index.php');
}

//check if all fields are filled and if fields are valid
//? refactor a tester
if (empty($postData['titre']) || empty($postData['artiste']) || empty($postData['image']) || empty($postData['description']) || (!filter_var($postData['image'])) || (strlen($postData['description']) < 3) ) {
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

    <img src="img\dancing-toothless.gif" alt="Bravo">


<?php 
}
?>