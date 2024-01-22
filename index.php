<?php
    require 'header.html';
    require 'db_connection.php';
    require 'oeuvreManager.php';
?>

<div id="liste-oeuvres">
    <?php 
    $oeuvres = getAllOeuvres();
    foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.html'; ?>
