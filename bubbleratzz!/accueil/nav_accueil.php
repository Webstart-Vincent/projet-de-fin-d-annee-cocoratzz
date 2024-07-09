<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Ratzz</title>
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <!-- Meta description -->
    <meta name="description" content="Découvrez Bubble Ratzz - votre destination pour les ingrédients et ustensiles nécessaires pour créer des Bubble Tea personnalisables chez vous.">

</head>
<body>
    <!-- Header section -->
    <header>
        <!-- Logo -->
        <div class="logo">
        <a href="../accueil/accueil.php"><img src="../asset/logo/logo_Bubble_Ratzz.svg" alt="Logo de Bubble Ratzz" /></a>
        </div>
        <!-- Top links -->
        <div class="top-links">
            <a href="../categorie/categorie.php">Catégorie</a>
            <a href="../produit/produit.php">Produit</a>
            <a href="../contact/contact.php">Contact</a>
            <a href="../a_propos/a_propos.php">À propos</a>
        </div>
        <!-- Navigation menu -->
        <nav>
            <ul>
                <li><a href="#" aria-label="Rechercher"><img src="../asset/picto/picto_search.svg" alt="Icône de recherche" /></a></li>
                <li>
                    <a href="../favoris/favoris.php" aria-label="Favoris">
                        <img src="../asset/picto/picto_like.svg" alt="Icône de favoris" />
                        <span id="like-counter"><?php echo isset($_SESSION['favoris']) ? count($_SESSION['favoris']) : 0; ?></span>
                    </a>
                </li>                
                <li>
                    <a href="../panier/panier.php" aria-label="Panier">
                        <img src="../asset/picto/picto_cart.svg" alt="Icône de panier" />
                        <span id="cart-counter"><?php echo isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0; ?></span>
                    </a>
                </li>
                <li><a href="../profil/profil.php" aria-label="Compte utilisateur"><img src="../asset/picto/picto_account.svg" alt="Icône de compte utilisateur" /></a></li>
                <li><a href="../tableau_de_bord/tableau_de_bord.php" aria-label="Administration"><img src="../asset/picto/picto_admin.svg" alt="Icône d'administration" /></a></li>
            </ul>
        </nav>

        <script>
// Fonction pour mettre à jour le compteur de likes
function updateLikeCounter() {
    // Utilisez AJAX pour récupérer le nombre de likes depuis la session PHP
    // Exemple simple :
    const count = <?php echo isset($_SESSION['favoris']) ? count($_SESSION['favoris']) : 0; ?>;
    // Mettez à jour l'élément DOM qui affiche le compteur de likes
    document.getElementById('like-counter').innerText = count;
}

// Appelez la fonction au chargement de la page
document.addEventListener('DOMContentLoaded', updateLikeCounter);
</script>

<script>
// Fonction pour mettre à jour le compteur de panier
function updateCartCounter() {
    // Utilisez AJAX pour récupérer le nombre de produits dans le panier depuis la session PHP
    // Exemple simple :
    const count = <?php echo isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0; ?>;
    // Mettez à jour l'élément DOM qui affiche le compteur de panier
    document.getElementById('cart-counter').innerText = count;
}

// Appelez la fonction au chargement de la page
document.addEventListener('DOMContentLoaded', updateCartCounter);
</script>
    </header>

