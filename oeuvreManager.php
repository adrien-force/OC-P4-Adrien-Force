<?php

require 'db_connection.php';

function getAllOeuvres() {

    try {
        global $mysqlClient;
        $sqlQuery = 'SELECT * FROM oeuvres';
        $oeuvrestatement = $mysqlClient->prepare($sqlQuery);
        $oeuvrestatement->execute();
        $oeuvres = $oeuvrestatement->fetchAll(PDO::FETCH_ASSOC);
        return $oeuvres;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getOeuvreByID($id) {

    try {
        global $mysqlClient;
        $sqlQuery = 'SELECT * FROM oeuvres WHERE id = :id';
        $oeuvrestatement = $mysqlClient->prepare($sqlQuery);
        $oeuvrestatement->execute([':id' => $id]);
        $oeuvre = $oeuvrestatement->fetch(PDO::FETCH_ASSOC);
        return $oeuvre;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function addOeuvre($titre, $artiste, $image, $description) {

    try {
        global $mysqlClient;
        $sqlQuery = "INSERT INTO oeuvres (titre, artiste, image, description) VALUES (:titre, :artiste, :image, :description)";
        $statement = $mysqlClient->prepare($sqlQuery);
        $statement->execute([
            ':titre' => $titre,
            ':artiste' => $artiste,
            ':image' => $image,
            ':description' => $description
        ]);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

