<?php
    require 'header.php';
    require 'bdd.php';

     // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
     if(empty($_GET['id'])) {
         header('Location: index.php');
    }
    
    $oeuvre = null;

    // On parcourt les oeuvres du tableau afin de rechercher celle qui a l'id précisé dans l'URL
    foreach($oeuvres as $o) {
        
        // intval permet de transformer l'id de l'URL en un nombre (exemple : "2" devient 2)
        if($o['oeuvre_id'] === intval($_GET['id'])) {
            $oeuvre = $o;
            break; // On stoppe le foreach si on a trouvé l'oeuvre
        }
    }

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($oeuvre)) { ?>

        <h1>Oups !</h1>
        <p>L'oeuvre que vous recherchez n'existe pas.</p>
        <p>Vous allez être redirigé vers la page d'accueil dans 5 secondes.</p>

<?php
        header("refresh:5;url=index.php");
    } else {
        // Si l'oeuvre existe, on affiche ses informations
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php } require 'footer.php'; ?>
