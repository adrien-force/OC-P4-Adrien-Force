<?php
    require 'header.php';
    require 'oeuvres.php';
?>

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
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['oeuvre_id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
