<style>
    .product-section {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }
    .product-item {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        text-align: center;
    }
    .product-item img {
        max-width: 100%;
        height: auto;
        border-bottom: 1px solid #ddd;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }
    .product-item p {
        font-size: 16px;
        font-weight: bold;
        margin: 10px 0;
    }
    .product-item .price {
        color: #007bff;
        font-size: 18px;
        font-weight: bold;
    }
    h6 {
        font-size: 24px;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    .btn-create-creation {
        display: block;
        width: 200px; /* Largeur du bouton */
        margin: 0 auto; /* Centre horizontalement */
        text-align: center; /* Centrage du texte */
        padding: 10px; /* Espace intérieur */
        text-decoration: none; /* Supprimer la décoration de lien */
        color: white; /* Couleur du texte */
        font-weight: bold; /* Gras */
        border-radius: 5px; /* Bordure arrondie */
        background-color: #FD9F8A; /* Couleur de fond */
    }
</style>


<?php
require '../autre/BDD.php'; // Require database connection
include '../nav/nav_accueil.php'; // Include navigation

echo "<section class='product-section scrollable-container'>";

$sql_all_products = "SELECT * FROM produits"; // Fetch all products
$result_all_products = $conn->query($sql_all_products);

if ($result_all_products->num_rows > 0) {
    while ($row = $result_all_products->fetch_assoc()) {
        $image_path = '../Page_administrateur/uploads/' . htmlspecialchars(basename($row['image_url']));
        echo "<div class='product-item'>";
        echo "<img src='" . $image_path . "' alt='Image pour le produit " . htmlspecialchars($row['nom']) . "'>";
        echo "<p>" . htmlspecialchars($row['nom']) . "</p>";
        echo "<span class='price'>" . htmlspecialchars($row['prix']) . "€</span>";
        echo "</div>";
    }
} else {
    echo "Aucun produit disponible pour le moment.";
}

echo "</section>";

// Bouton "CRÉER SA CRÉATION !"
echo "<a href='../Page_principale/personnalisation.php' class='btn-create-creation'>CRÉER SA CRÉATION !</a>";

$conn->close(); // Close the database connection

include '../autre/footer.php';
?>