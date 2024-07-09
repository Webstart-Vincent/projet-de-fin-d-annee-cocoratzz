<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Ratzz</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../style_accueil.css"> <!-- Link to your external CSS file -->
    <meta name="description" content="Découvrez Bubble Ratzz - votre destination pour les ingrédients et ustensiles nécessaires pour créer des Bubble Tea personnalisables chez vous.">
    <!-- Lien vers votre fichier JavaScript -->
    <script src="../cart.js" defer></script>
</head>
<body>
<?php
// Inclure la connexion à la base de données
include_once '../autre/BDD.php';
// Inclure le modèle
include_once '../accueil/modele_accueil.php';

// Récupérer les données depuis le modèle
$categories = getCategories($conn);
$produits_phares = getProduitsPhares($conn);

// Inclure la vue pour afficher l'interface utilisateur
include '../accueil/vue_accueil.php';
?>

</body>
</html>
