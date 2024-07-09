<?php
session_start(); // Assurez-vous que session_start() est appelé une seule fois au début

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: inscription.php");
    exit();
}

// Inclure le fichier de navigation
include_once '../nav/nav_account.php';
require '../autre/BDD.php';

// Récupérer les informations de l'utilisateur depuis la base de données
$user_id = $_SESSION['user_id'];

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparer la requête SQL pour récupérer les informations de l'utilisateur
$sql = "SELECT nom, prenom, email, adresse, code_postal, ville, pays FROM utilisateurs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($nom, $prenom, $email, $adresse, $code_postal, $ville, $pays);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - Bubble Ratzz</title>
    <style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .account-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 40px;
        }
        .account-info, .orders-history {
            flex: 1 1 45%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .account-info h2, .orders-history h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .account-info ul {
            list-style-type: none;
            padding: 0;
        }
        .account-info ul li {
            margin-bottom: 10px;
        }
        .orders-history table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .orders-history th, .orders-history td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .orders-history th {
            background-color: #f0f0f0;
        }
        .orders-history td {
            vertical-align: top;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-logout {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-content h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        #orders-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        #orders-details th, #orders-details td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        #orders-details th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<main class="main-container">
    <h1>Mon Compte</h1>

    <section class="account-section">
        <div class="account-info">
            <h2>Informations Personnelles</h2>
            <ul>
                <li><strong>Nom:</strong> <?php echo htmlspecialchars($nom); ?></li>
                <li><strong>Prénom:</strong> <?php echo htmlspecialchars($prenom); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
                <li><strong>Adresse:</strong> <?php echo htmlspecialchars($adresse); ?></li>
                <li><strong>Code Postal:</strong> <?php echo htmlspecialchars($code_postal); ?></li>
                <li><strong>Ville:</strong> <?php echo htmlspecialchars($ville); ?></li>
                <li><strong>Pays:</strong> <?php echo htmlspecialchars($pays); ?></li>
            </ul>
            <a href="#" class="btn" id="edit-info-btn">Modifier mes informations</a>
        </div>

        <!-- Formulaire de modification (initialement caché) -->
        <div id="edit-info-form" style="display: none;">
            <h2>Modifier mes informations</h2>
            <form action="update_info.php" method="post">
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" required><br>

                <label for="code_postal">Code Postal:</label>
                <input type="text" id="code_postal" name="code_postal" required><br>

                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville" required><br>

                <label for="pays">Pays:</label>
                <input type="text" id="pays" name="pays" required><br>

                <button type="submit" class="btn">Enregistrer</button>
                <button type="button" class="btn" id="cancel-edit-btn">Annuler</button>
            </form>
        </div>

        <div class="orders-history">
            <h2>Historique des Commandes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Numéro de Commande</th>
                        <th>Date</th>
                        <th>Montant Total</th>
                        <th>État</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connexion à la base de données
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Récupérer les commandes de l'utilisateur
                    $sql = "SELECT id, date, statut FROM commandes WHERE utilisateur_id = ?";
                    $stmt = $conn->prepare($sql);
                    if ($stmt) {
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $stmt->bind_result($orderId, $date, $statut);
                        while ($stmt->fetch()) {
                            echo "<tr>";
                            echo "<td>#" . htmlspecialchars($orderId) . "</td>";
                            echo "<td>" . htmlspecialchars(date("d/m/Y", strtotime($date))) . "</td>";
                            echo "<td>" . htmlspecialchars($statut) . "</td>";
                            echo "</tr>";
                        }
                        $stmt->close();
                    } else {
                        echo "<tr><td colspan='4'>Erreur lors de l'exécution de la requête : " . $conn->error . "</td></tr>";
                    }
                    
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <a href="#" class="btn" id="view-all-orders">Voir toutes mes commandes</a>
        </div>
    </section>
    <!-- Lien de déconnexion -->
    <a href="../Page_principale/inscription.php" class="btn btn-logout">Se déconnecter</a>
</main>

<!-- Modal -->
<div id="ordersModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Détails des Commandes</h2>
        <div id="orders-details"></div>
    </div>
</div>

<script>
    // Script JavaScript pour le modal
    var modal = document.getElementById("ordersModal");
    var btn = document.getElementById("view-all-orders");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        fetch('get_orders_details.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById("orders-details").innerHTML = data;
                modal.style.display = "block";
            });
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Script pour afficher le formulaire de modification des informations
    document.getElementById('edit-info-btn').addEventListener('click', function() {
        document.getElementById('edit-info-form').style.display = 'block';
    });

    document.getElementById('cancel-edit-btn').addEventListener('click', function() {
        document.getElementById('edit-info-form').style.display = 'none';
    });
</script>

</body>
</html>
