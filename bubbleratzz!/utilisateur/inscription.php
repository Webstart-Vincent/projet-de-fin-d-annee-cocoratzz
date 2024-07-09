<?php
session_start();

if ($_SERVER['HTTP_HOST'] == 'localhost') {
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
$nom = $prenom = $email = $mot_de_passe = $adresse = $code_postal = $ville = $pays = '';
$message = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et valider les données du formulaire
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $prenom = htmlspecialchars(trim($_POST['prenom'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $adresse = htmlspecialchars(trim($_POST['adresse'] ?? ''));
    $code_postal = htmlspecialchars(trim($_POST['code_postal'] ?? ''));
    $ville = htmlspecialchars(trim($_POST['ville'] ?? ''));
    $pays = htmlspecialchars(trim($_POST['pays'] ?? ''));

    // Vérifier si l'email est déjà enregistré
    $query = "SELECT id FROM utilisateurs WHERE email = ?";
    $stmt = $connexion->prepare($query);
    if ($stmt === false) {
        die('Erreur de préparation de la requête : ' . $connexion->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $message = 'Email déjà enregistré.';
    } else {
        // Hacher le mot de passe
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Insérer le nouvel utilisateur dans la base de données
        $query = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, adresse, code_postal, ville, pays) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connexion->prepare($query);
        if ($stmt === false) {
            die('Erreur de préparation de la requête : ' . $connexion->error);
        }

        $stmt->bind_param('ssssssss', $nom, $prenom, $email, $hashed_password, $adresse, $code_postal, $ville, $pays);
        if ($stmt->execute()) {
            // Inscription réussie, rediriger vers la page de connexion ou de profil
            $_SESSION['user_id'] = $stmt->insert_id;
            header('Location: ../Page_principale/profil.php');
            exit; // Assurez-vous de terminer le script après la redirection
        } else {
            $message = 'Erreur lors de l\'inscription.';
        }
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
    <title>Inscription - Bubble Ratzz</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <meta name="description" content="Créez un compte Bubble Ratzz pour accéder à vos informations et profiter de nos offres.">
    <link rel="stylesheet" href="./style.css">
    <style>
        header {
            background-color: #fff;
            color: #000;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        body, ul, li, a {
            font-weight: normal;
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
            font-weight: 900;
            font-size: 24px;
            text-decoration: none;
            color: #A4EBE7;
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
        }

        nav ul li a img {
            width: 30px;
            height: auto;
        }
    </style>
</head>
<body>
    <?php include_once '../nav/nav_account.php'; ?>

    <div class="promo-bar">
        <div class="promo-text">
            Découvrez nos nouvelles recettes de Bubble Tea pour l'été ! <a href="#">En savoir plus</a>
        </div>
    </div>

    <div class="container">
        <h2>Créez votre compte</h2>
        <h3>Rejoignez-nous et venez récolter vos récompenses...</h3>
        <div class="form-content">
            <div class="form-image">
                <img src="../asset/img/Bubbleaccount.jpg" alt="Description de l'image">
            </div>
            <div class="form-container">
                <form method="post" action="">
                    <div>
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div>
                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="prenom">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="mot_de_passe">Mot de passe:</label>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <div>
                        <label for="adresse">Adresse:</label>
                        <input type="text" id="adresse" name="adresse">
                    </div>
                    <div>
                        <label for="code_postal">Code Postal:</label>
                        <input type="text" id="code_postal" name="code_postal">
                    </div>
                    <div>
                        <label for="ville">Ville:</label>
                        <input type="text" id="ville" name="ville">
                    </div>
                    <div>
                        <label for="pays">Pays:</label>
                        <input type="text" id="pays" name="pays">
                    </div>
                    <div class="full-width">
                        <button type="submit">Inscription</button>
                    </div>
                </form>
                <?php if ($message): ?>
                    <p><?php echo $message; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Raleway:wght@900&display=swap");

        h1 {
            font-family: "Raleway", sans-serif;
            font-style: italic;
            font-weight: 900;
            color: transparent;
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

        .promo-bar {
            background: linear-gradient(90deg, #DBC3DF 0%, #A4EBE7 100%);
            color: #fff;
            text-align: center;
            padding: 10px 0;
            font-size: 16px;
            font-weight: bold;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .promo-text {
            display: inline-block;
            white-space: nowrap;
            animation: scrollText 20s linear infinite;
        }

        .promo-bar a {
            color: #fff;
            margin-left: 10px;
        }

        @keyframes scrollText {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            padding: 20px;
        }

        .form-content {
            display: flex;
            justify-content: space-between;
            width: 100%;
            flex-wrap: wrap;
        }

        .form-image {
            flex: 1;
            margin-right: 20px;
        }

        .form-container {
            flex: 1;
            max-width: 600px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form div {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #A4EBE7;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #DBC3DF;
        }

        .full-width {
            width: 100%;
        }
    </style>
</body>
</html>
