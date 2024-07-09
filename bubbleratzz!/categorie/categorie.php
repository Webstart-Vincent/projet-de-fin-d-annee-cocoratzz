<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css"> <!-- Link to your external CSS file -->
    <title>Categories</title>
</head>
<body>
<?php
// categorie.php (contrôleur)
include '../accueil/nav_accueil.php';

// Inclure une seule fois le fichier de connexion à la base de données
require_once '../autre/BDD.php';

// Inclure le modèle pour récupérer les données
require_once '../categorie/modele_categorie.php';

// Récupérer les produits phares
$produits_phares = getProduitsPhares($conn);

// Inclure la vue pour afficher l'interface utilisateur
require '../categorie/vue_categorie.php';

// Inclure le pied de page
include '../autre/footer.php';

$conn->close(); // Fermer la connexion à la base de données
?>
</body>
</html>
