<?php
include '../nav/nav_admin.php'; // Include navigation
require '../autre/BDD.php'; // Require database connection

// Vérification de la connexion à la base de données
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Variables pour pré-remplir le formulaire
$nom = '';
$description = '';
$image_url = '';
$id_to_update = null;

// Fonction pour gérer le téléchargement de fichier
function uploadFile($file) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if ($file["error"] !== UPLOAD_ERR_OK) {
        throw new Exception("Erreur lors du téléchargement du fichier.");
    }

    $target_file = $target_dir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = @getimagesize($file["tmp_name"]);
    if ($check === false) {
        throw new Exception("Le fichier n'est pas une image valide.");
    }

    if (file_exists($target_file)) {
        throw new Exception("Désolé, le fichier existe déjà.");
    }

    if ($file["size"] > 5000000) {  // Limite de 5 Mo
        throw new Exception("Désolé, votre fichier est trop volumineux.");
    }

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    if (!in_array($imageFileType, $allowed_types)) {
        throw new Exception("Désolé, seuls les fichiers JPG, JPEG, PNG, GIF et SVG sont autorisés.");
    }

    if (!move_uploaded_file($file["tmp_name"], $target_file)) {
        throw new Exception("Désolé, une erreur s'est produite lors du téléchargement de votre fichier.");
    }

    return $target_file;
}

// Traitement de l'ajout ou mise à jour de catégorie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';
    $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';    
    $id_to_update = $_POST['id'] ?? null;

    try {
        $image_url = $_POST['image_url'] ?? '';
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $image_url = uploadFile($_FILES["image"]);
        }

        if ($action == 'add') {
            $stmt = $conn->prepare("INSERT INTO categories (nom, description, image_url) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nom, $description, $image_url);
            if (!$stmt->execute()) {
                throw new Exception("Erreur lors de l'ajout de la catégorie: " . $stmt->error);
            }
        } elseif ($action == 'update' && $id_to_update) {
            $stmt = $conn->prepare("UPDATE categories SET nom = ?, description = ?, image_url = ? WHERE id = ?");
            $stmt->bind_param("sssi", $nom, $description, $image_url, $id_to_update);
            if (!$stmt->execute()) {
                throw new Exception("Erreur lors de la mise à jour de la catégorie: " . $stmt->error);
            }
        }
    } catch (Exception $e) {
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
    }
}

// Traitement de la suppression de catégorie
if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->bind_param('i', $id);
    if (!$stmt->execute()) {
        echo "<p>Erreur lors de la suppression de la catégorie: " . $stmt->error . "</p>";
    }
}

// Récupération des catégories
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
if (!$result) {
    die("Erreur lors de la récupération des catégories: " . $conn->error);
}

// Pré-remplissage du formulaire pour modification
if (isset($_POST['modifier'])) {
    $id_to_update = $_POST['id'];
    $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->bind_param('i', $id_to_update);
    if ($stmt->execute()) {
        $result_modif = $stmt->get_result();
        if ($result_modif->num_rows > 0) {
            $row_modif = $result_modif->fetch_assoc();
            $nom = $row_modif['nom'];
            $description = $row_modif['description'];
            $image_url = $row_modif['image_url'];
        }
    }
} else {
    // Si ce n'est pas une modification, initialiser les variables à vide
    $nom = '';
    $description = '';
    $image_url = '';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration des Catégories</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1, h2 {
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        form {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="file"] {
            margin-bottom: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            /* Supprimer le fond blanc derrière les boutons d'action */
            margin-left: 5px; /* Espacement entre les boutons */
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
        }
        .action-buttons {
            text-align: right;
            margin-bottom: 10px; /* Espacement sous les boutons d'action */
        }
        .action-buttons form {
            display: flex;
            align-items: center; /* Centrer verticalement les boutons */
        }
        .action-buttons form button {
            margin-left: 10px; /* Espacement entre les boutons */
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
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }
        .close, .cancel {
            color: #aaa;
            align-items: center;
        }
        .close:hover, .close:focus, .cancel:hover, .cancel:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .cancel {
            color: white;
            border: none;
        }
        .delete {
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Administration des Catégories</h1>

        <!-- Formulaire d'ajout/modification de catégorie -->
        <h2><?php echo $id_to_update ? 'Modifier la catégorie' : 'Ajouter une catégorie'; ?></h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?php echo $id_to_update ? 'update' : 'add'; ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id_to_update); ?>">
            
            <label>Nom de la catégorie :</label>
            <input type="text" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>
            
            <label>Description :</label>
            <textarea name="description" required><?php echo htmlspecialchars($description); ?></textarea>
                
            <label>Image de la catégorie :</label>
            <?php if ($image_url) { ?>
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="Image de la catégorie">
                <input type="hidden" name="image_url" value="<?php echo htmlspecialchars($image_url); ?>">
            <?php } ?>
            <input type="file" name="image" accept="image/*">
            
            <?php if ($nom || $description || $image_url) { ?>
                <button type="submit">Enregistrer les modifications</button>
            <?php } else { ?>
                <button type="submit">Ajouter cette catégorie</button>
            <?php } ?>
        </form>

        
        <hr>

        <!-- Tableau des catégories existantes -->
        <h2>Liste des catégories</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nom']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Image de la catégorie"></td>
                    <td class="action-buttons">
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <button type="submit" name="modifier">Modifier</button>
                            <button type="button" onclick="showDeleteConfirmation(<?php echo htmlspecialchars($row['id']); ?>)">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Modal de confirmation de suppression -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Êtes-vous sûr de vouloir supprimer cette catégorie ?</p>
                <form method="post" id="deleteForm">
                    <input type="hidden" name="id" id="deleteCategoryId">
                    <button type="submit" name="supprimer">Supprimer</button>
                    <button type="button" class="cancel">Annuler</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour afficher le modal de confirmation de suppression
        function showDeleteConfirmation(categoryId) {
            var modal = document.getElementById('deleteModal');
            var deleteCategoryIdInput = document.getElementById('deleteCategoryId');
            deleteCategoryIdInput.value = categoryId;
            modal.style.display = 'block';
        }

        // Fonction pour fermer le modal de confirmation de suppression
        function closeDeleteConfirmation() {
            var modal = document.getElementById('deleteModal');
            modal.style.display = 'none';
        }

        // Fermer le modal lorsque l'utilisateur clique sur (x)
        var span = document.getElementsByClassName('close')[0];
        span.onclick = function() {
            closeDeleteConfirmation();
        }

        // Fermer le modal lorsque l'utilisateur clique sur le bouton "Annuler"
        var cancelBtn = document.getElementsByClassName('cancel')[0];
        cancelBtn.onclick = function() {
            closeDeleteConfirmation();
        }

        // Fermer le modal lorsque l'utilisateur clique n'importe où en dehors du modal
        window.onclick = function(event) {
            var modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeDeleteConfirmation();
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
