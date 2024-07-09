<?php
// Assurez-vous de démarrer la session si ce n'est pas déjà fait
session_start();

// Vérifiez si le formulaire a été soumis et que le bouton like a été pressé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['like_button'])) {
    // Récupérez l'ID du produit aimé depuis le formulaire
    $id_produit = $_POST['like_button'];

    // Enregistrez l'ID du produit aimé dans la session (par exemple, pour le compteur de likes)
    if (!isset($_SESSION['favoris'])) {
        $_SESSION['favoris'] = array();
    }

    // Ajoutez l'ID du produit aimé à la liste des favoris dans la session
    if (!in_array($id_produit, $_SESSION['favoris'])) {
        $_SESSION['favoris'][] = $id_produit;
    }
}
?>

<!-- Votre code HTML pour la page favoris.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoris</title>
    <!-- Ajoutez vos feuilles de style et autres métadonnées si nécessaire -->
</head>
<body>
    <h1>Mes favoris</h1>
    <?php
    // Affichez ici les produits que l'utilisateur a ajoutés à ses favoris
    ?>
</body>
</html>
