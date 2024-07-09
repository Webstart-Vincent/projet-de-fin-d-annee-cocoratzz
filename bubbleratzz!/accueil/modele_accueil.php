<?php
// Fonctions pour accéder aux données depuis la base de données

function getCategories($conn) {
    $sql = "SELECT * FROM categories LIMIT 4";
    $result = $conn->query($sql);

    $categories = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
    return $categories;
}

function getProduitsPhares($conn) {
    $sql = "SELECT * FROM produits WHERE produit_phare = 1";
    $result = $conn->query($sql);

    $produits = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $produits[] = $row;
        }
    }
    return $produits;
}
?>
