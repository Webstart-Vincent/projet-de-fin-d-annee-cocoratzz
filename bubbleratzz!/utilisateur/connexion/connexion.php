<?php
session_start();

if ('localhost' == $_SERVER['HTTP_HOST']) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bubbleratzz";
} else {
    $servername = "host";
    $username = "u220436049_dv23colyne";
    $password = "3iUon1hF7sy28ocV";
    $dbname = "u220436049_dv23colyne";
}

// Crée une connexion
$connexion = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Initialisation des variables
$email = $mot_de_passe = '';
$message = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et valider les données du formulaire
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    // Vérifier si l'utilisateur existe
    $query = "SELECT id, mot_de_passe FROM utilisateurs WHERE email = ?";
    $stmt = $connexion->prepare($query);

    if ($stmt === false) {
        die('Erreur de préparation de la requête : ' . $connexion->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();

        // Vérifier le mot de passe
        if (password_verify($mot_de_passe, $hashed_password)) {
            // Connexion réussie
            $_SESSION['user_id'] = $user_id;
            header('Location: ../Page_principale/profil.php');
            exit; // Assurez-vous de terminer le script après la redirection
        } else {
            // Mot de passe incorrect
            $message = 'Email ou mot de passe incorrect.';
        }
    } else {
        // Utilisateur non trouvé
        $message = 'Email ou mot de passe incorrect.';
    }

    // Fermer la déclaration préparée
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Bubble Ratzz</title>
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <!-- Meta description -->
    <meta name="description" content="Connectez-vous à votre compte Bubble Ratzz pour accéder à vos informations et profiter de nos offres.">
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
    <!-- Include the nav_account.php -->
    <?php include_once '../nav/nav_account.php'; ?>

    <!-- Barre promotionnelle -->
    <div class="promo-bar">
        <div class="promo-text">
            Découvrez nos nouvelles recettes de Bubble Tea pour l'été ! <a href="#">En savoir plus</a>
        </div>
    </div>

    <!-- Formulaire de connexion -->
    <div class="container">
        <h2>Vous avez déjà un compte? </h2>
        <h3> CONNECTEZ-VOUS! et venez récolter vos récompenses... </h3>
        <div class="form-content">
            <!-- Image à gauche du formulaire -->
            <div class="form-image">
                <img src="../asset/img/Bubbleaccount.jpg" alt="Description de l'image">
            </div>
            <div class="form-container">
                <form method="post" action="">
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="mot_de_passe">Mot de passe:</label>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <div class="full-width">
                        <button type="submit">Connexion</button>
                    </div>
                </form>
                <?php if ($message): ?>
                    <p><?php echo $message; ?></p>
                <?php endif; ?>
                <p><a href="#" onclick="openPopup()">Mot de passe oublié ?</a></p>
            </div>
        </div>
    </div>

      <!-- Pop-up de réinitialisation de mot de passe -->
      <div class="popup" id="passwordResetPopup">
        <div class="popup-content">
            <span class="popup-close" onclick="closePopup()">&times;</span>
            <h2>Réinitialiser le mot de passe</h2>
            <form id="passwordResetForm" method="post" action="../Page_principale/reinitialiser_le_mdp.php">
                <div>
                    <label for="reset_email">Email:</label>
                    <input type="email" id="reset_email" name="email" required>
                </div>
                <div class="full-width">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openPopup() {
            document.getElementById('passwordResetPopup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('passwordResetPopup').style.display = 'none';
        }
    </script>

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

        h2 {
            color: #A4EBE7;
        }

        h3 {
            color: #DBC3DF;
        }

        /* Styles pour la barre promotionnelle */
        .promo-bar {
            background: linear-gradient(90deg, #DBC3DF 0%, #A4EBE7 100%);
            color: #fff; /* Texte blanc sur la barre promotionnelle */
            text-align: center;
            padding: 10px 0;
            font-size: 16px;
            font-weight: bold;
            top: 0; /* Position en haut de la page */
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

        /* Styles pour le formulaire */
        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
        }

        .form-content {
            display: flex;
            width: 100%;
            max-width: 800px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-items: center;
            justify-content: space-between;
            margin-top: 60px; /* Ajuste la position pour éviter de chevaucher la barre de promo */
        }

        .form-image {
            flex: 1 1 40%;
            margin-right: 20px;
        }

        .form-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .form-container {
            flex: 1 1 55%;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        form div {
            flex: 1 1 45%;
        }

        form div.full-width {
            flex: 1 1 100%;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #A4EBE7;
            color: black;
            border: none;
            cursor: pointer;
            padding: 10px;
            width: 100%;
        }
    </style>
</body>
</html>
