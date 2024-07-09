<?php
// modele.php

/**
 * Récupère les produits d'un type spécifique depuis la base de données.
 *
 * @param mysqli $conn La connexion à la base de données.
 * @param string $type_produit Le type de produit à récupérer.
 * @return array Tableau des produits du type spécifié.
 */
function getProductsByType($conn, $type_produit) {
    $sql = "SELECT * FROM produits WHERE type_produit = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $type_produit);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

/**
 * Récupère les produits marqués comme produits phares depuis la base de données.
 *
 * @param mysqli $conn La connexion à la base de données.
 * @return array Tableau des produits phares.
 */
function getProduitsPhares($conn) {
    $sql = "SELECT * FROM produits WHERE produit_phare = 1";
    $result = $conn->query($sql);

    $produits_phares = [];
    while ($row = $result->fetch_assoc()) {
        $produits_phares[] = $row;
    }

    return $produits_phares;
}
?>
