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