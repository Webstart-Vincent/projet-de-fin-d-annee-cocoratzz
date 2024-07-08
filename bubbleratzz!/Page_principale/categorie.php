<style>
    .scrollable-container {
        max-height: 400px; /* Adjust the height as needed */
        overflow-y: auto;
        margin-bottom: 40px;
    }
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
        $image_path = '../Page_administrateur/uploads/' . htmlspecialchars(basename($row['image_url']));
        echo "<div class='product-item'>";
        echo "<img src='" . $image_path . "' alt='Image pour le produit phare " . htmlspecialchars($row['nom']) . "'>";
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
    echo "<section class='product-section scrollable-section'>"; // Ajout de la classe 'scrollable-section'
    
    $sql = "SELECT * FROM produits WHERE type_produit = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $type_produit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image_path = '../Page_administrateur/' . htmlspecialchars($row['image_url']);
            echo "<div class='product-item'>";
            echo "<img src='" . $image_path . "' alt='Image pour le produit " . htmlspecialchars($row['nom']) . "'>";
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

// Bouton "CRÉER SA CRÉATION !"
echo "<a href='../Page_principale/personnalisation.php' class='btn-create-creation' style='background-color: #FD9F8A;'>CRÉER SA CRÉATION !</a>";

$conn->close(); // Close the database connection

include '../autre/footer.php'
?>