<style>
    .product-section {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
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
</style>

<?php
require '../autre/BDD.php'; // Require database connection
include '../nav/nav_accueil.php'; // Include navigation

// Produits phares
echo "<h6>Produits phares</h6>";
echo "<section class='product-phare-section'>";

$sql_produits_phares = "SELECT * FROM produits WHERE produit_phare = 1"; // Fetch products marked as featured
$result_produits_phares = $conn->query($sql_produits_phares);

if ($result_produits_phares->num_rows > 0) {
    while ($row = $result_produits_phares->fetch_assoc()) {
        echo "<div class='product-item'>";
        echo "<img src='../Page_administrateur/uploads/" . htmlspecialchars(basename($row['image_url'])) . "' alt='Image pour le produit phare " . htmlspecialchars($row['nom']) . "'>";
        echo "<p>" . htmlspecialchars($row['nom']) . "</p>";
        echo "<span class='price'>" . htmlspecialchars($row['prix']) . "€</span>";
        echo "</div>";
    }
} else {
    echo "Aucun produit phare disponible pour le moment.";
}

echo "</section>";

// Fonction pour afficher les produits selon leur type
function display_products($conn, $type_produit, $title) {
    echo "<h6>" . htmlspecialchars($title) . "</h6>";
    echo "<section class='product-section'>";
    
    $sql = "SELECT * FROM produits WHERE type_produit = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $type_produit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product-item'>";
            echo "<img src='../Page_administrateur/" . htmlspecialchars($row['image_url']) . "' alt='Image pour le produit " . htmlspecialchars($row['nom']) . "'>";
            echo "<p>" . htmlspecialchars($row['nom']) . "</p>";
            echo "<span class='price'>" . htmlspecialchars($row['prix']) . "€</span>";
            echo "</div>";
        }
    } else {
        echo "Aucun produit disponible pour cette catégorie.";
    }

    echo "</section>";
}

// Affichage des produits par type
display_products($conn, 'coffret', 'Coffrets');
display_products($conn, 'boisson', 'Boissons');
display_products($conn, 'accessoire', 'Accessoires');
display_products($conn, 'ingredient', 'Ingrédients');
display_products($conn, 'creation', 'Créations');

$conn->close(); // Close the database connection
?>
