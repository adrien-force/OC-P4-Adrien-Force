<?php require 'header.html';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



// If the session contains an error message, display it
if (isset($_SESSION['error_message']) && $_GET['erreur'] == true) {
    echo '<h5 class="error">' . $_SESSION['error_message'] . '</h5>';
    unset($_SESSION['error_message']);

    // Display the previously entered form data if available
    $titre = isset($_SESSION['postData']['titre']) ? $_SESSION['postData']['titre'] : '';
    $artiste = isset($_SESSION['postData']['artiste']) ? $_SESSION['postData']['artiste'] : '';
    $image = isset($_SESSION['postData']['image']) ? $_SESSION['postData']['image'] : '';
    $description = isset($_SESSION['postData']['description']) ? $_SESSION['postData']['description'] : '';
} else {
    unset($_SESSION['postData']);
    $titre = '';
    $artiste = '';
    $image = '';
    $description = '';

}
?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre" value="<?php echo $titre; ?>">
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste" value="<?php echo $artiste; ?>">
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image" value="<?php echo $image; ?>">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"><?php echo $description; ?></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'footer.html'; 
//unset post data
unset($_SESSION['postData']);
?>