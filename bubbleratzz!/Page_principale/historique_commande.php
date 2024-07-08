<?php
require '../autre/BDD.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    die("Vous devez être connecté pour accéder à cette page.");
}

$userId = $_SESSION['user_id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT c.id, c.date, c.statut, p.nom AS produit, ci.quantite
        FROM commande c
        JOIN commande_items ci ON c.id = ci.commande_id
        JOIN produits p ON ci.produit_id = p.id
        WHERE c.utilisateur_id = ?";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($orderId, $date, $statut, $produit, $quantite);

    $orders = [];
    while ($stmt->fetch()) {
        $orders[$orderId]['date'] = $date;
        $orders[$orderId]['statut'] = $statut;
        $orders[$orderId]['items'][] = [
            'produit' => $produit,
            'quantite' => $quantite
        ];
    }
    $stmt->close();
} else {
    echo "Erreur lors de l'exécution de la requête : " . $conn->error;
}

$conn->close();

foreach ($orders as $orderId => $orderDetails) {
    echo "<h3>Commande #$orderId</h3>";
    echo "<p>Date: " . htmlspecialchars(date("d/m/Y", strtotime($orderDetails['date']))) . "</p>";
    echo "<p>Statut: " . htmlspecialchars($orderDetails['statut']) . "</p>";
    echo "<table>";
    echo "<thead><tr><th>Produit</th><th>Quantité</th></tr></thead>";
    echo "<tbody>";
    foreach ($orderDetails['items'] as $item) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($item['produit']) . "</td>";
        echo "<td>" . htmlspecialchars($item['quantite']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - Bubble Ratzz</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            text-align: center;
            margin: 30px 0;
            font-size: 2.5rem;
        }
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .account-section, .register-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 40px;
        }
        .account-info, .orders-history, .register-form {
            flex: 1 1 45%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .account-info h2, .orders-history h2, .register-form h2 {
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<?php include '../nav_account.php'; ?> <!-- Inclure la barre de navigation -->
<?php require '../BDD.php'; ?>
<?php session_start(); ?>

<div class="promo-bar">
    <div class="promo-text">
        Livraison gratuite à partir de 35€ d'achat – Soldes jusqu'à -70%
    </div>
</div>

<main class="main-container">
    <h1>Mon Compte</h1>

    <?php
    function connectDatabase() {
        global $servername, $username, $password, $dbname;
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        // Si l'utilisateur n'est pas connecté, afficher le formulaire d'inscription
        echo '
        <section class="register-section">
            <div class="register-form">
                <h2>Inscription</h2>
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Adresse:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn">S\'inscrire</button>
                </form>
            </div>
        </section>';
    } else {
        // Si l'utilisateur est connecté, afficher les informations du compte et l'historique des commandes
        $userId = $_SESSION['user_id'];
        ?>
        <section class="account-section">
            <div class="account-info">
                <h2>Informations Personnelles</h2>
                <ul>
                    <?php
                    $conn = connectDatabase();

                    $stmt = $conn->prepare("SELECT nom, email, adresse FROM utilisateurs WHERE id = ?");
                    $stmt->bind_param("i", $userId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<li><strong>Nom:</strong> " . htmlspecialchars($row["nom"]) . "</li>";
                                echo "<li><strong>Email:</strong> " . htmlspecialchars($row["email"]) . "</li>";
                                echo "<li><strong>Adresse:</strong> " . htmlspecialchars($row["adresse"]) . "</li>";
                            }
                        } else {
                            echo "<li>Aucune information trouvée.</li>";
                        }
                    } else {
                        echo "<li>Erreur lors de l'exécution de la requête : " . $conn->error . "</li>";
                    }

                    $stmt->close();
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
                        $conn = connectDatabase();

                        $stmt = $conn->prepare("SELECT id, date, statut FROM commande WHERE utilisateur_id = ?");
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>#". htmlspecialchars($row["id"])."</td>";
                                    echo "<td>". date("d/m/Y", strtotime($row["date"]))."</td>";
                                    echo "<td>Montant non spécifié</td>"; // Remplacer par le montant réel si disponible
                                    echo "<td>". htmlspecialchars($row["statut"])."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Aucune commande trouvée</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Erreur lors de l'exécution de la requête : " . $conn->error . "</td></tr>";
                        }

                        $stmt->close();
                        $conn->close();
                        ?>
                    </tbody>
                </table>
                <a href="#" class="btn">Voir toutes mes commandes</a>
            </div>
        </section>
        <?php
    }
    ?>
</main>

</body>
</html>
