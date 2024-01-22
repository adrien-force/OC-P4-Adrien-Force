<?php
require 'header.html';
require 'db_connection.php';
require 'oeuvreManager.php';

// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if (empty($_GET['id'])) {
    header('Location: index.php');
}

$oeuvre = getOeuvreByID($_GET['id']);

// Si aucune oeuvre trouvé, on redirige vers la page d'accueil
if (is_null($oeuvre)) { ?>

    <h1>Oups !</h1>
    <p>L'oeuvre que vous recherchez n'existe pas.</p>
    <p>Vous allez être redirigé vers la page d'accueil dans 5 secondes.</p>

    <!-- OPTIONAL : FUN -->
    <!-- <img src="img\pulp.gif" alt="Oups"> -->

<?php
    header("refresh:3.5;url=index.php");
} else {
    // Si l'oeuvre existe, on affiche ses informations
?>

    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?= htmlspecialchars($oeuvre['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($oeuvre['titre'], ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?= htmlspecialchars($oeuvre['titre'], ENT_QUOTES, 'UTF-8') ?></h1>
            <p class="description"><?= htmlspecialchars($oeuvre['artiste'], ENT_QUOTES, 'UTF-8') ?></p>
            <p class="description-complete">
                <?= htmlspecialchars($oeuvre['description'], ENT_QUOTES, 'UTF-8') ?>
            </p>
        </div>
    </article>

<?php }
require 'footer.html'; ?>