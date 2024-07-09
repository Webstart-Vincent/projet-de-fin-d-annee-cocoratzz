<?php
// Contrôleur pour gérer les interactions et les données à afficher

// Inclure la connexion à la base de données
include_once '../autre/BDD.php';
// Inclure le modèle
include_once 'modele.php';

// Récupérer les données nécessaires depuis le modèle
$categories = getCategories($conn);
$produits_phares = getProduitsPhares($conn);

// Inclure la vue pour afficher l'interface utilisateur
include 'vue_accueil.php';
?>
