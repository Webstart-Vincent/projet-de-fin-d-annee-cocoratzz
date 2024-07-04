<?php
// Database configuration
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

// Create a connection
$connexion = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Initialize variables
$nom = $prenom = $adresse = $email = $mot_de_passe = '';
$message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form data
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $prenom = htmlspecialchars(trim($_POST['prenom'] ?? ''));
    $adresse = htmlspecialchars(trim($_POST['adresse'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $mot_de_passe = password_hash(trim($_POST['mot_de_passe'] ?? ''), PASSWORD_BCRYPT); // Hash the password

    // Check if the user already exists
    $query = "SELECT email FROM utilisateurs WHERE email = ?";
    $stmt = $connexion->prepare($query);
    
    if ($stmt === false) {
        die('Erreur de préparation de la requête : ' . $connexion->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User already exists
        $message = 'Cette adresse e-mail est déjà utilisée.';
    } else {
        // Insert data into the database
        $query = "INSERT INTO utilisateurs (nom, prenom, adresse, email, mot_de_passe) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connexion->prepare($query);

        if ($stmt === false) {
            die('Erreur de préparation de la requête : ' . $connexion->error);
        }

        $stmt->bind_param('sssss', $nom, $prenom, $adresse, $email, $mot_de_passe);
        if ($stmt->execute()) {
            // Registration successful
            $message = 'Inscription réussie';
            
            // Redirect to profil.php after successful registration
            header('Location: ../Page_principale/profil.php');
            exit; // Ensure the script ends after the redirection
        } else {
            // Registration error
            $message = 'Erreur lors de l\'inscription : ' . $stmt->error;
        }
    }

    // Close the prepared statement
    $stmt->close();
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
    <!-- Inline styles for header -->
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

    <!-- Formulaire d'inscription -->
    <div class="container">
        <h2>INSCRIVEZ-VOUS!</h2>
        <h3>Profitez de nombreux avantages! Nouvelle carte disponible!</h3>
        <div class="form-content">
            <!-- Image à gauche du formulaire -->
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
                        <input type="text" id="prenom" name="prenom" required>
                    </div>
                    <div>
                        <label for="adresse">Adresse:</label>
                        <input type="text" id="adresse" name="adresse" required>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="mot_de_passe">Mot de passe:</label>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <div class="full-width">
                        <button type="submit">S'inscrire</button>
                    </div>
                    <div class="full-width">
                        <a href="../Page_principale/connexion.php" class="button-link">Connexion</a>
                    </div>
                </form>
            </div>
        </div>
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?> <a href="../Page_principale/connexion.php">Se connecter</a></p>
        <?php endif; ?>
    </div>

    <style>

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

        button[type="submit"]{
            background-color: #A4EBE7;
            color: black;
            border: none;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .button-link {
            background-color: #A4EBE7;
            color: black;
            border: none;
            cursor: pointer;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 95%;
        }

        .button-link:hover, button[type="submit"]:hover {
            background-color: #89cdc9; /* Darken the color slightly on hover */
        }
    </style>
</body>
</html>
