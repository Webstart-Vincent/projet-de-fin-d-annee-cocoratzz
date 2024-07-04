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
    <link rel="stylesheet" href="../style.css"> <!-- Assurez-vous que le chemin est correct -->
    <style>
        /* Styles pour l'en-tête (header) */
        header {
            background-color: #fff;
            color: #000;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        /* Réinitialisation du texte en gras pour tous les éléments */
        body,
        ul,
        li,
        a {
            font-weight: normal;
        }

        .logo img {
            width: 181px;
            height: 90px;
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
            font-weight: 900;
            font-size: 24px;
            text-decoration: none;
            color: #a4ebe7;
            margin: 0 20px;
        }

        .top-links a:hover {
            text-decoration: underline;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 27px;
            display: flex;
            align-items: center;
        }

        /* Dégradé de couleur pour le texte "Tableau de bord" */
        .top-links a {
            background: linear-gradient(90deg, #fd9f8a 0%, #a4ebe7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

    </style>
</head>
<body>
    <header>
        <div class="logo">
        <a href="../accueil.php"><img src="../asset/logo/logo_bubble_ratzz_admin.svg" alt="Logo de Bubble Ratzz pour la partie admin">
        </div>
        <div class="top-links">
            <a href="../Page_principale/tableau_de_bord.php">Tableau de bord</a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="../Page_principale/accueil.php" aria-label="accueil">
                        <img src="../asset/picto_admin/revenir_au_site.svg" alt="Revenir au site">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
</body>
</html>
