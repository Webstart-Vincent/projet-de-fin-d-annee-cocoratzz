<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

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
    <link rel="stylesheet" href="./style.css">
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
            color: #A4EBE7; /* Couleur correspondant aux pictos */
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
            <a href="../accueil/accueil.php"></a><img src="../asset/logo/logo_Bubble_ratzz_account.svg" alt="Logo de Bubble Ratzz pour les parties utilisateurs" />
        </div>
        <!-- Top links -->
        <div class="top-links">
            <a href="../categorie/categorie.php">Catégorie</a>
            <a href="../Page_principale/produit.php">Produit</a>
            <a href="../Page_principale/contact.php">Contact</a>
            <a href="../Page_principale/a_propos.php">À propos</a>
        </div>
        <!-- Navigation menu -->
        <nav>
            <ul>
                <li><a href="#" aria-label="Rechercher"><img src="../asset/picto_account/material-symbols_search.svg" alt="Icône de recherche" /></a></li>
                <li><a href="../Page_principale/favoris.php" aria-label="Favoris"><img src="../asset/picto_account/icon-park-outline_like.svg" alt="Icône de favoris" /></a></li>
                <li><a href="../Page_principale/panier.php" aria-label="Panier"><img src="../asset/picto_account/solar_cart-bold.svg" alt="Icône de panier" /></a></li>
                <li><a href="../connexion/connexion.php" aria-label="Compte utilisateur"><img src="../asset/picto_account/picto_account-bleu.svg" alt="Icône de compte utilisateur" /></a></li>
            </ul>
        </nav>
    </header>

    <style>
        /* Import de la police Raleway depuis Google Fonts */
        @import url("https://fonts.googleapis.com/css2?family=Raleway:wght@900&display=swap");

        /* Styles spécifiques pour les titres */
        h1 {
            font-family: "Raleway", sans-serif;
            font-style: italic;
            font-weight: 900; /* Poids 'black' de la police Raleway */
            color: transparent; /* Texte transparent */
            background: linear-gradient(90deg, #DBC3DF 0%, #A4EBE7 100%);
            -webkit-background-clip: text;
            background-clip: text;
        }

        /* Styles pour la barre promotionnelle */
        .promo-bar {
            background: linear-gradient(90deg, #DBC3DF 0%, #A4EBE7 100%);
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

        /* Animation de défilement pour le texte de la barre promotionnelle */
        @keyframes scrollText {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
