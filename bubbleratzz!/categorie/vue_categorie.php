<?php
// vue_categorie.php (vue)

// Fonction pour afficher les produits phares
function displayProduitsPhares($produits_phares) {
    echo "<h6>Produits phares</h6>";
    echo "<section class='product-phare-section'>";
    if (!empty($produits_phares)) {
        foreach ($produits_phares as $produit) {
            $image_path = '../Page_administrateur/uploads/' . htmlspecialchars(basename($produit['image_url']));
            echo "<div class='product-item'>";
            echo "<img src='" . $image_path . "' alt='Image pour le produit phare " . htmlspecialchars($produit['nom']) . "'>";
            echo "<p>" . htmlspecialchars($produit['nom']) . "</p>";
            echo "<span class='price'>" . htmlspecialchars($produit['prix']) . "€</span>";
            echo "</div>";
        }
    } else {
        echo "Aucun produit phare disponible pour le moment.";
    }
    echo "</section>";
}

// Fonction pour afficher les produits par type
function displayProductsByType($conn, $type_produit, $title) {
    $products = getProductsByType($conn, $type_produit);
    
    echo "<h6>" . htmlspecialchars($title) . "</h6>";
    echo "<section class='product-section scrollable-container'>";
    if (!empty($products)) {
        foreach ($products as $product) {
            $image_path = '../Page_administrateur/uploads/' . htmlspecialchars(basename($product['image_url']));
            echo "<div class='product-item'>";
            echo "<img src='" . $image_path . "' alt='Image pour le produit " . htmlspecialchars($product['nom']) . "'>";
            echo "<p>" . htmlspecialchars($product['nom']) . "</p>";
            echo "<span class='price'>" . htmlspecialchars($product['prix']) . "€</span>";
            echo "</div>";
        }
    } else {
        echo "Aucun produit disponible pour cette catégorie.";
    }
    echo "</section>";
}

// Afficher les produits phares
displayProduitsPhares($produits_phares);

// Afficher les produits par type
displayProductsByType($conn, 'coffret', 'Coffrets');
displayProductsByType($conn, 'boisson', 'Boissons');
displayProductsByType($conn, 'accessoire', 'Accessoires');
displayProductsByType($conn, 'ingredient', 'Ingrédients');
displayProductsByType($conn, 'creation', 'Créations');

// Bouton "CRÉER SA CRÉATION !"
echo "<a href='../Page_principale/personnalisation.php' class='btn-create-creation' style='background-color: #FD9F8A;'>CRÉER SA CRÉATION !</a>";
?>
