<?php
// Assurez-vous de démarrer la session si ce n'est pas déjà fait
session_start();

// Vérifiez si le formulaire a été soumis et que le bouton panier a été pressé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cart_button'])) {
    // Récupérez l'ID du produit ajouté au panier depuis le formulaire
    $id_produit = $_POST['cart_button'];

    // Enregistrez l'ID du produit dans le panier dans la session
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    // Ajoutez l'ID du produit au panier dans la session
    $_SESSION['panier'][] = $id_produit;
}
?>

<!-- Votre code HTML pour la page panier.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <!-- Ajoutez vos feuilles de style et autres métadonnées si nécessaire -->
</head>
<body>
    <h1>Mon panier</h1>
    <?php
    // Affichez ici les produits que l'utilisateur a ajoutés à son panier
    ?>
</body>
</html>
