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
                <?php
                    // Connexion à la base de données
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Récupérer les informations de l'utilisateur
                    $userId = $_SESSION['user_id'];

                    // Préparer et exécuter la requête
                    $sql = "SELECT nom, email, adresse FROM utilisateurs WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    if ($stmt) {
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $stmt->bind_result($nom, $email, $adresse);
                        $stmt->fetch();
                        $stmt->close();

                        if ($nom && $email && $adresse) {
                            echo "<li><strong>Nom:</strong> " . htmlspecialchars($nom) . "</li>";
                            echo "<li><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
                            echo "<li><strong>Adresse:</strong> " . htmlspecialchars($adresse) . "</li>";
                        } else {
                            echo "<li>Aucune information trouvée.</li>";
                        }
                    } else {
                        echo "<li>Erreur lors de l'exécution de la requête : " . $conn->error . "</li>";
                    }

                    $conn->close();
                ?>
            </ul>
            <a href="#" class="btn">Modifier mes informations</a>
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
                        $stmt->bind_param("i", $userId);
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
</main>

<!-- Modal -->
<div id="ordersModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Détails des Commandes</h2>
        <div id="orders-details"></div>
    </div>
</div>

<!-- Lien de déconnexion -->
<a href="logout.php" class="btn">Se déconnecter</a>

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
</script>

</body>
</html>
