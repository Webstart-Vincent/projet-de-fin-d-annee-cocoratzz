<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Ratzz</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <meta name="description" content="Découvrez Bubble Ratzz - votre destination pour les ingrédients et ustensiles nécessaires pour créer des Bubble Tea personnalisables chez vous.">
</head>
<body>

<?php
include '../nav/nav_accueil.php';
include_once '../autre/BDD.php';
?>

<div class="promo-bar">
    <div class="promo-text">
        Livraison gratuite à partir de 35€ d'achat – Soldes jusqu'à -70%
    </div>
</div>

<main>
    <section>
        <p class="concept">Bubble Ratzz vous propose de quoi faire vous-même vos Bubble Tea, que ce soient les ingrédients ou les<br>ustensiles. Et petit bonus, certains articles sont personnalisables.</p>
    </section>

    <div class="rond">
        À partir de<br> 4,50€
    </div>

    <div class="AMAZING">
        <div class="the_maison">
            <section class="left-section">
                <h1>Préparations Maison</h1>
                <p>Nos Bubble Tea aux recettes uniques sont faits à partir de préparations maisons.</p>
            </section>
            <section class="left-section">
                <h1>Nos Thés</h1>
                <p>Nos différents thés ont été soigneusement sélectionnés pour vous apporter le meilleur goût possible.</p>
            </section>
        </div>

        <img src="../asset/img/bubble_tea_1.svg" alt="image principal">

        <div class="frais_sirop">
            <section class="left-section">
                <h1>Sirop de Qualité</h1>
                <p>Nous utilisons les sirops Monin, sirops les plus qualitatifs sur le marché pour l’élaboration de nos Bubble Tea.</p>
            </section>
            <section class="right-section">
                <h1>Fruits Frais</h1>
                <p>Nous pressons nos fruits tous les jours pour fabriquer nos Bubble Tea.</p>
            </section>
        </div>
    </div>

    <h5>Catégories</h5>
    <section class="categories-section">
        <?php
        $sql = "SELECT * FROM categories LIMIT 4"; // Fetch the first 4 categories
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='categorie'>";
                echo "<div class='image-description'>";
                echo "<div class='image-1'>";
                echo "<img src='../Page_administrateur/uploads/" . htmlspecialchars(basename($row['image_url'])) . "' alt='" . htmlspecialchars($row['nom']) . "'>";
                echo "</div>";
                echo "<div class='text-1'>";
                echo "<h3>" . htmlspecialchars($row['nom']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "<button>voir plus</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "0 catégories";
        }
        ?>
    </section>

    <h6>Produits phares</h6>
    <section class="product-phare-section">
        <?php
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
        ?>
    </section>
    <h7>Préparez votre bubble tea en 2 <br>minutes chrono</h7>
    <section class="cook-section">
        <section class="cook">
            <img src="../asset/GIF/GIF1.webp" alt="GIF etape 1" class="reduce-size">
            <h8>Choisir les perles ...</h8>
            <p>Ajoute 30 ou 50 grammes de perles (de fruit ou de tapioca) dans ton verre à bubble tea</p>
        </section>
        <section class="cook">
            <img src="../asset/GIF/GIF2.webp" alt="GIF etape 2" class="reduce-size">
            <h9>Ajoute un max de glaçons ...</h9>
            <p>Si tu veux un bubble tea bien froid, n'hésite pas à mettre pleins de glaçons !</p>
        </section>
        <section class="cook">
            <img src="../asset/GIF/GIF3.webp" alt="GIF etape 3" class="reduce-size">
            <h10>Verse ton thé ...</h10>
            <p>Verse ton thé ou ton infusion préférée ...</p>
        </section>
        <section class="cook">
            <img src="../asset/GIF/GIF4.webp" alt="GIF etape 4" class="reduce-size">
            <h11>... & ton sirop!</h11>
            <p>Il ne reste plus qu'à ajouter le sirop de ton choix et mélanger le tout : C'est prêt!</p>
        </section>
    </section>
</main>
<?php include '../autre/footer.php'; ?>
</body>
</html>
