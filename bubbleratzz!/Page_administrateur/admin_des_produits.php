<?php
// Inclusion des fichiers nécessaires
include '../nav/nav_admin.php';
require '../autre/BDD.php';

// Vérification de la connexion à la base de données
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Variables pour pré-remplir le formulaire
$nom = '';
$description = '';
$prix = '';
$stock = '';
$image_url = '';
$produit_phare = 0; // Par défaut, produit phare est à 0
$type_produit = 'coffret'; // Par défaut, type de produit est à coffret
$id_to_update = null;

// Traitement de la mise à jour du produit phare
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = htmlspecialchars($_POST['nom'] ?? '');
    $description = htmlspecialchars($_POST['description'] ?? '');
    $prix = $_POST['prix'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $produit_phare = isset($_POST['produit_phare']) ? 1 : 0;
    $type_produit = htmlspecialchars($_POST['type_produit'] ?? 'coffret');

    // Gestion de l'upload de l'image si une nouvelle image est fournie
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = basename($_FILES['image']['name']);
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_destination = '../Page_administrateur/uploads/' . $image_name;
        
        if (!is_dir('../Page_administrateur/uploads/')) {
            mkdir('../Page_administrateur/uploads/', 0777, true);
        }

        if (move_uploaded_file($image_tmp_name, $image_destination)) {
            $image_url = 'uploads/' . $image_name;
        } else {
            die("Erreur lors de l'upload de l'image.");
        }
    } else {
        // Si aucune nouvelle image n'est fournie, conserver l'ancienne
        $image_url = htmlspecialchars($_POST['image_url'] ?? '');
    }

    // Mise à jour des données dans la base de données
    $sql = $conn->prepare("UPDATE produits SET nom = ?, description = ?, prix = ?, stock = ?, produit_phare = ?, image_url = ?, type_produit = ? WHERE id = ?");
    $sql->bind_param('ssdissii', $nom, $description, $prix, $stock, $produit_phare, $image_url, $type_produit, $id);

    if (!$sql->execute()) {
        die("Erreur lors de la mise à jour: " . $sql->error);
    }
    $sql->close();
}

// Traitement de l'ajout de produit
if (isset($_POST['ajouter']) && !isset($_POST['update'])) {
    $nom = htmlspecialchars($_POST['nom'] ?? '');
    $description = htmlspecialchars($_POST['description'] ?? '');
    $prix = $_POST['prix'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $produit_phare = isset($_POST['produit_phare']) ? 1 : 0;
    $type_produit = htmlspecialchars($_POST['type_produit'] ?? 'coffret');
    
    // Traitement de l'upload de l'image
    $image_url = ''; // Variable pour stocker l'URL de l'image
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = basename($_FILES['image']['name']);
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_destination = '../Page_administrateur/uploads/' . $image_name;
        
        if (!is_dir('../Page_administrateur/uploads/')) {
            mkdir('../Page_administrateur/uploads/', 0777, true);
        }

        if (move_uploaded_file($image_tmp_name, $image_destination)) {
            $image_url = 'uploads/' . $image_name;
        } else {
            die("Erreur lors de l'upload de l'image.");
        }
    } else {
        die("Erreur: Veuillez sélectionner une image.");
    }

    // Insertion sécurisée des données dans la base de données
    $sql = $conn->prepare("INSERT INTO produits (nom, description, prix, stock, image_url, produit_phare, type_produit) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param('ssdissi', $nom, $description, $prix, $stock, $image_url, $produit_phare, $type_produit);

    if (!$sql->execute()) {
        die("Erreur lors de l'ajout du produit: " . $sql->error);
    }
    $sql->close();
}

// Traitement de la suppression de produit
if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];

    $sql = $conn->prepare("DELETE FROM produits WHERE id = ?");
    $sql->bind_param('i', $id);

    if (!$sql->execute()) {
        die("Erreur lors de la suppression du produit: " . $sql->error);
    }
    $sql->close();
}

// Récupération des produits
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);

// Vérification de la validité du résultat
if (!$result) {
    die("Erreur lors de la récupération des produits: " . $conn->error);
}

// Traitement du formulaire de modification
if (isset($_POST['modifier'])) {
    $id_to_update = $_POST['id'];

    $sql = $conn->prepare("SELECT * FROM produits WHERE id = ?");
    $sql->bind_param('i', $id_to_update);

    if ($sql->execute()) {
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Assigner les valeurs à des variables pour les pré-remplir dans le formulaire d'édition
            $nom = htmlspecialchars($row['nom']);
            $description = htmlspecialchars($row['description']);
            $prix = $row['prix'];
            $stock = $row['stock'];
            $image_url = htmlspecialchars($row['image_url']);
            $produit_phare = $row['produit_phare'];
            $type_produit = htmlspecialchars($row['type_produit']);
        } else {
            die("Aucun produit trouvé avec cet ID.");
        }
    } else {
        die("Erreur lors de la récupération du produit: " . $sql->error);
    }

    $sql->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration des Produits</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    h1, h2 {
        color: #333;
    }
    .container {
        width: 80%;
        margin: 0 auto;
    }
    form {
        border-radius: 8px;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }
    input[type="text"],
    input[type="number"],
    textarea,
    select,
    input[type="file"],
    button {
        margin-bottom: 10px;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        outline: none; /* Supprimer l'outline bleu sur focus */
        width: calc(100% - 22px); /* Prendre 22px pour compenser le padding et la bordure */
    }
    input[type="file"] {
        margin-bottom: 20px;
    }

    input[type="checkbox"] {
        margin-right: 10px;
    }

    /* Nouvelle règle pour ajuster l'alignement vertical */
    .checkbox-container {
        margin-top: 5px; /* Ajustez selon vos préférences */
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin-left: 5px;
        font-size: 14px;
        width: 100%; /* Largeur à 100% pour remplir le conteneur */
        box-sizing: border-box; /* Boîte de dimension pour inclure le padding */
        padding: 10px;
    }
    button:hover {
        background-color: #0056b3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    img {
        max-width: 181px;
        height: 90px;
        display: block;
        margin: 0 auto; /* Centrer l'image dans son conteneur */
    }
    .action-buttons {
        text-align: right;
        margin-bottom: 10px;
    }
    .action-buttons form {
        display: inline-block;
        margin-left: 5px;
    }
    .type-produit {
        text-transform: capitalize;
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Administration des Produits</h1>

        <!-- Formulaire pour ajouter/modifier un produit -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id_to_update; ?>">
            <label for="nom">Nom du Produit:</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($description); ?></textarea>
            <label for="prix">Prix:</label>
            <input type="number" id="prix" name="prix" step="0.01" min="0" value="<?php echo $prix; ?>" required>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" min="0" value="<?php echo $stock; ?>" required>
            <label>Image:</label>
            <input type="file" name="image">
            <?php if ($image_url): ?>
                <img src="../Page_administrateur/<?php echo $image_url; ?>" alt="Image du produit">
                <input type="hidden" name="image_url" value="<?php echo $image_url; ?>">
            <?php endif; ?>
            <div class="checkbox-container">
                <label for="produit_phare">Produit Phare</label>
                <input type="checkbox" id="produit_phare" name="produit_phare" <?php echo $produit_phare ? 'checked' : ''; ?>>
            </div>
            <label for="type_produit">Type de Produit:</label>
            <select name="type_produit" id="type_produit" required>
                <option value="coffret" <?php echo $type_produit === 'coffret' ? 'selected' : ''; ?>>Coffret</option>
                <option value="boisson" <?php echo $type_produit === 'boisson' ? 'selected' : ''; ?>>Boisson</option>
                <option value="accessoire" <?php echo $type_produit === 'accessoire' ? 'selected' : ''; ?>>Accessoire</option>
                <option value="ingredient" <?php echo $type_produit === 'ingredient' ? 'selected' : ''; ?>>Ingrédient</option>
                <option value="creation" <?php echo $type_produit === 'creation' ? 'selected' : ''; ?>>Création</option>
            </select>
            <div class="action-buttons">
                <?php if ($id_to_update): ?>
                    <button type="submit" name="update">Mettre à Jour</button>
                <?php else: ?>
                    <button type="submit" name="ajouter">Ajouter</button>
                <?php endif; ?>
            </div>
        </form>

        <!-- Liste des produits -->
        <h2>Liste des Produits</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Type de Produit</th>
                <th>Produit Phare</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['nom']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo $row['prix']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td><img src="../Page_administrateur/<?php echo htmlspecialchars($row['image_url']); ?>" alt="Image du produit"></td>
                    <td class="type-produit"><?php echo ucfirst(htmlspecialchars($row['type_produit'])); ?></td>
                    <td><?php echo $row['produit_phare'] ? 'Oui' : 'Non'; ?></td>
                    <td>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="modifier">Modifier</button>
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="supprimer">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php
// Fermeture de la connexion à la base de données
$conn->close();
?>
