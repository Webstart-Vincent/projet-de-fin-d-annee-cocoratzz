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
    <!-- Inline styles for header -->
    <style>
        /* Styles pour l'en-tête (header) */
        header {
            background-color: #fff;
            color: #000; /* Texte noir pour la visibilité */
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative; /* Assure que les éléments positionnés à l'intérieur sont relatifs à ce conteneur */
        }

        /* Réinitialisation du texte en gras pour tous les éléments */
        body,
        ul,
        li,
        a {
            font-weight: normal; /* Retirer le gras pour tous les éléments autres que les titres */
        }

        .logo img {
            width: 181px;
            height: auto;
        }

        .top-links {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        .top-links a {
            font-family: "Raleway", sans-serif;
            font-style: italic;
            font-weight: 900; /* Poids 'black' de la police Raleway */
            font-size: 24px; /* Taille de la police */
            text-decoration: none; /* Supprime la soulignement par défaut */
            color: #fd9f8a; /* Couleur correspondant aux pictos */
            margin: 0 20px; /* Espacement entre les liens */
        }

        .top-links a:hover {
            text-decoration: underline; /* Soulignement au survol */
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex; /* Pour un affichage flexible des éléments de la liste */
        }

        nav ul li {
            margin-left: 27px;
        }

        nav ul li a img {
            width: 30px;
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Header section -->
    <header>
        <!-- Logo -->
        <div class="logo">
        <a href="../Page_principale/accueil.php"><img src="../asset/logo/logo_Bubble_Ratzz.svg" alt="Logo de Bubble Ratzz" /></a>
        </div>
        <!-- Top links -->
        <div class="top-links">
            <a href="../Page_principale/categorie.php">Catégorie</a>
            <a href="../Page_principale/produit.php">Produit</a>
            <a href="../Page_principale/contact.php">Contact</a>
            <a href="../Page_principale/a_propos.php">À propos</a>
        </div>
        <!-- Navigation menu -->
        <nav>
            <ul>
                <li><a href="#" aria-label="Rechercher"><img src="../asset/picto/picto_search.svg" alt="Icône de recherche" /></a></li>
                <li><a href="../Page_principale/favoris.php" aria-label="Favoris"><img src="../asset/picto/picto_like.svg" alt="Icône de favoris" /></a></li>
                <li><a href="../Page_principale/panier.php" aria-label="Panier"><img src="../asset/picto/picto_cart.svg" alt="Icône de panier" /></a></li>
                <li><a href="../Page_principale/profil.php" aria-label="Compte utilisateur"><img src="../asset/picto/picto_account.svg" alt="Icône de compte utilisateur" /></a></li>
                <li><a href="../Page_principale/tableau_de_bord.php" aria-label="Administration"><img src="../asset/picto/picto_admin.svg" alt="Icône d'administration" /></a></li>
            </ul>
        </nav>
    </header>

    <style>
        /* Import de la police Raleway depuis Google Fonts */
@import url("https://fonts.googleapis.com/css2?family=Raleway:wght@900&display=swap");

/* Styles spécifiques pour les titres */
h1,
h2,
h3,
h4,
h5,
h6,
h7,
h8,
h9,
h10,
h11,
h12,
h13,
h14,
h15 {
    font-family: "Raleway", sans-serif;
    font-style: italic;
    font-weight: 900; /* Poids 'black' de la police Raleway */
    color: transparent; /* Texte transparent */
    background: linear-gradient(90deg, #fd9f8a 0%, #dbc3df 100%);
    -webkit-background-clip: text;
    background-clip: text;
}

.concept {
    font-family: "Raleway", sans-serif;
    font-size: 24px;
    font-style: italic;
}

.AMAZING {
    margin-top: 20px;
    margin-bottom: 10px;
}

h5 {
    margin-bottom: 10px; /* Adjust the margin-bottom */
    margin-top: 20px;
    text-align: center; /* Center align if needed */
}

h6 {
    margin-top: 20px; /* Adjust the margin-top */
    text-align: center; /* Center align if needed */
}

h5,
h6,
h7 {
    font-size: 64px; /* Taille de police spécifique pour h5, h6 et h7 */
    font-weight: 700; /* Poids 'bold' pour h8, h9, h10 et h11 */
    background: linear-gradient(90deg, #fd9f8a 0%, #dbc3df 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 10px;
    text-align: left;
    margin-left: 40px;
}

h8,
h9,
h10,
h11 {
    font-size: 24px; /* Taille de police spécifique pour h8, h9, h10 et h11 */
    font-weight: 700; /* Poids 'bold' pour h8, h9, h10 et h11 */
    background: linear-gradient(90deg, #fd9f8a 0%, #dbc3df 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 10px;
    text-align: left;
    margin-left: 40px;
}

h12,
h13,
h14,
h15 {
    font-size: 24px; /* Taille de police spécifique pour h8, h9, h10 et h11 */
    font-weight: 700; /* Poids 'bold' pour h8, h9, h10 et h11 */
    background: linear-gradient(90deg, #fd9f8a 0%, #dbc3df 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 10px;
    text-align: left;
    margin-left: 40px;
}

/* Styles généraux pour le corps du document */
body {
    margin: 0;
    padding: 0;
    font-family: "Raleway", sans-serif; /* Utilisation de la police Raleway pour tout le texte */
}

/* Styles pour la barre promotionnelle */
.promo-bar {
    background: linear-gradient(90deg, #fd9f8a 0%, #dbc3df 100%);
    color: #fff; /* Texte blanc sur la barre promotionnelle */
    text-align: center;
    padding: 10px 0;
    font-size: 16px;
    font-weight: bold;
    top: 80px; /* Position de la barre promotionnelle par rapport au haut */
    width: 100%; /* Barre promotionnelle occupe toute la largeur */
    z-index: 1000; /* Assure que la barre est au-dessus des autres éléments */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre pour donner de la profondeur */
}

.promo-text {
    display: inline-block;
    white-space: nowrap; /* Le texte ne se coupe pas en plusieurs lignes */
    animation: scrollText 20s linear infinite; /* Animation pour faire défiler le texte */
}

.promo-bar a {
    color: #fff; /* Couleur des liens dans la barre promotionnelle */
    margin-left: 10px;
}

/* Styles pour la section principale (main) */
main {
    padding-top: 60px; /* Espace pour éviter la superposition avec la barre promotionnelle */
    text-align: center;
}

/* Styles pour les sections à gauche et à droite de l'image */
.left-section,
.right-section {
    width: calc(50% - 20px); /* Largeur de 50% moins 20px de marge */
    box-sizing: border-box;
    display: inline-block; /* Affiche les sections en ligne */
    vertical-align: top; /* Alignement vertical en haut */
    margin-bottom: 20px; /* Espace en bas de chaque section */
    text-align: left; /* Alignement du texte à gauche */
    font-family: "Raleway", sans-serif;
    color: #000;
    font-size: 18px;
    line-height: 1.5;
}

.categories-section {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    justify-content: center; /* Centrage horizontal */
    align-items: center; /* Centrage vertical */
}

.image-description {
    display: flex;
    gap: 20px;
    align-items: center;
    max-width: 100%;
}

.image-1 img,
.image-2 img {
    max-width: 100%;
    height: auto;
}

.text-1,
.text-2 {
    max-width: 644px; /* Largeur maximale du texte */
}

.text-1 h5,
.text-2 h5 {
    font-family: "Raleway", sans-serif;
    font-size: 24px;
    font-weight: bold;
    font-style: italic;
    background: linear-gradient(90deg, #fd9f8a 0%, #dbc3df 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Réinitialisation des marges et paddings pour les sections */
section {
    margin: 0;
    padding: 0;
}

/* Style pour le rond */
.rond {
    width: 150px; /* Réduire la largeur du cercle */
    height: 150px; /* Réduire la hauteur du cercle */
    border-radius: 50%; /* Pour faire un cercle */
    background: linear-gradient(90deg, #fd9f8a 0%, #dbc3df 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Raleway", sans-serif;
    color: white;
    font-size: 20px; /* Réduire la taille du texte */
    position: relative;
    bottom: -30px; /* Positionnement légèrement plus haut par rapport au bas du conteneur */
    left: 90%; /* Centrage horizontal */
    transform: translateX(-50%) rotate(45deg); /* Translation pour le centrage horizontal et rotation */
}

.the_maison,
.frais_sirop {
    display: flex;
    flex-direction: column;
}

.the_maison {
    display: flex;
    flex-direction: column-reverse;
    flex-wrap: wrap;
    align-content: center;
}

.frais_sirop {
    display: flex;
    flex-direction: column-reverse;
    flex-wrap: wrap;
    align-content: center;
}

.AMAZING {
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: -50px; /* Ajustement pour remonter la section */
}

/* Animation de défilement pour le texte de la barre promotionnelle */
@keyframes scrollText {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

@media (max-width: 768px) {
    .categories-section {
        padding: 10px;
    }
}

/* CSS pour la section des catégories */
.categories-section {
    display: grid;
    grid-template-columns: repeat(
        auto-fit,
        minmax(200px, 1fr)
    ); /* Grille flexible avec une largeur minimale de 200px */
    gap: 20px;
    padding: 20px;
    text-align: center;
    margin-bottom: 40px; /* Ajout de marge en bas */
}

.categorie {
    display: flex;
    align-items: center;
    justify-content: center; /* Centrage horizontal */
    gap: 20px;
}

.image-description {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #ccc; /* Ajout d'une bordure grise autour des éléments */
    padding: 15px; /* Ajout de remplissage à l'intérieur des éléments */
    border-radius: 8px; /* Ajout de coins arrondis */
    transition: transform 0.3s ease; /* Animation de transformation lors du survol */
    max-width: 100%;
}

.image-description:hover {
    transform: translateY(-5px); /* Déplacement vers le haut lors du survol */
}

.image-description img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px; /* Espacement entre l'image et le texte */
}

.image-description p {
    font-family: "Raleway", sans-serif;
    font-style: italic;
    font-size: 18px;
    margin-bottom: 5px; /* Espacement sous le nom de la catégorie */
}

.image-description .image {
    flex: 1; /* Laisse l'image occuper autant d'espace que possible */
    margin-right: 20px; /* Marge à droite pour séparer l'image du texte */
}

.image-description .text {
    flex: 2; /* Laisse le texte occuper autant d'espace que possible */
}

.image-description button {
    background-color: #fd9f8a; /* Couleur de fond du bouton */
    color: white; /* Couleur du texte du bouton */
    padding: 10px 20px; /* Rembourrage du bouton */
    border: none; /* Supprime la bordure */
    cursor: pointer; /* Curseur de la main au survol */
    margin-top: 10px; /* Marge en haut du bouton */
}

.image-description button:hover {
    background-color: #c75571; /* Couleur de fond du bouton au survol */
}

/* CSS pour la section des produits phares */
.product-phare-section {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    padding: 20px;
    text-align: center;
    margin-bottom: 40px; /* Ajout de marge en bas */
}

.product-item {
    text-align: center;
    padding: 10px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.product-item img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

.product-item p {
    margin: 10px 0;
}

.product-item .price {
    font-weight: bold;
    color: #e91e63;
    font-size: 1.2rem;
}

@media (max-width: 768px) {
    .product-phare-section {
        grid-template-columns: repeat(2, 1fr);
    }
}

.reduce-size {
    width: 50%; /* Largeur maximale de l'image */
    height: auto; /* Hauteur automatique pour maintenir les proportions */
    display: block; /* Assure que l'image respecte les marges et le padding correctement */
    margin: 0 auto; /* Centre l'image horizontalement */
}

/* CSS pour la section de préparation du bubble tea */
.cook-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
    margin-bottom: 40px; /* Ajout de marge en bas */
}

.cook-section h7 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px; /* Ajout de marge en bas */
}

.cook-section p {
    font-size: 16px;
    text-align: center;
}

.cook {
    text-align: center;
}

.cook img {
    max-width: 100%;
    height: auto;
    border-radius: 50%;
}

    </style>