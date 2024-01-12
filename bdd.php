<?php


try {
    $mysqlClient = new PDO(
    'mysql:host=localhost;dbname=artbox;port=8888',
    'root',
    'root'
    );
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//! MODIFIER OEUVRE_ID EN ID

$sqlQuery = 'SELECT * FROM oeuvres';
$oeuvrestatement = $mysqlClient->prepare($sqlQuery);
$oeuvrestatement->execute();
$oeuvres = $oeuvrestatement->fetchAll(PDO::FETCH_ASSOC);

?>