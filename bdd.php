<?php


try {
    $mysqlClient = new PDO(
    'mysql:host=localhost;dbname=artbox;port=8888',
    'admin',
    'admin'
    );
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$sqlQuery = 'SELECT * FROM oeuvres';
$oeuvrestatement = $mysqlClient->prepare($sqlQuery);
$oeuvrestatement->execute();
$oeuvres = $oeuvrestatement->fetchAll(PDO::FETCH_ASSOC);


?>