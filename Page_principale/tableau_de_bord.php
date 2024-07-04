<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Bubble Ratzz</title>
</head>
<body>

<?php include '../nav/nav_admin.php'; ?>
<?php require '../autre/BDD.php'; ?>

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

.dashboard-section {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.dashboard-button {
    text-align: center;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 15px 30px;
    background: #a4ebe7;
    color: #000;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.btn:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    .dashboard-button {
        flex-basis: 100%;
    }
}

/* Style pour les sections supplémentaires */
.section {
    margin-top: 40px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

.section h2 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #333;
    border-bottom: 2px solid #eee;
    padding-bottom: 10px;
}

.section-content {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

.section-item {
    flex: 1 0 250px;
    text-align: center;
    padding: 15px;
    background-color: #f0f0f0;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.section-item:hover {
    background-color: #e0e0e0;
}

.section-item a {
    text-decoration: none;
    color: #333;
}

</style>

<main class="main-container">

    <section class="dashboard-section">
        <div class="dashboard-button">
            <a href="../Page_administrateur/admin_d_inscription.php" class="btn">Inscription</a>
        </div>

        <div class="dashboard-button">
            <a href="../Page_administrateur/admin_de_connexion.php" class="btn">Connexion</a>
        </div>

        <div class="dashboard-button">
            <a href="../Page_administrateur/admin_de_reinitialisation_de_mdp.php" class="btn">Réinitialisation</a>
        </div>

        <div class="dashboard-button">
            <a href="../Page_administrateur/admin_des_avis.php" class="btn">Avis</a>
        </div>

        <div class="dashboard-button">
            <a href="../Page_administrateur/admin_des_categories.php" class="btn">Catégories</a>
        </div>

        <div class="dashboard-button">
            <a href="../Page_administrateur/admin_des_commandes.php" class="btn">Commandes</a>
        </div>

        <div class="dashboard-button">
            <a href="../Page_administrateur/admin_des_produits.php" class="btn">Produits</a>
        </div>
    </section>

    <!-- Section Utilisateurs -->
    <section class="section">
        <h2>Gestion des Utilisateurs</h2>
        <div class="section-content">
            <div class="section-item">
                <a href="#">Liste des utilisateurs</a>
            </div>
            <div class="section-item">
                <a href="#">Autorisations et rôles</a>
            </div>
            <div class="section-item">
                <a href="#">Historique des activités</a>
            </div>
        </div>
    </section>

    <!-- Section Statistiques -->
    <section class="section">
        <h2>Résumé des Statistiques</h2>
        <div class="section-content">
            <div class="section-item">
                <a href="#">Nombre d'utilisateurs inscrits</a>
            </div>
            <div class="section-item">
                <a href="#">Nombre de commandes passées</a>
            </div>
            <div class="section-item">
                <a href="#">Chiffre d'affaires total</a>
            </div>
            <div class="section-item">
                <a href="#">Statistiques des produits populaires</a>
            </div>
        </div>
    </section>

    <!-- Section Rapports -->
    <section class="section">
        <h2>Rapports et Analyses</h2>
        <div class="section-content">
            <div class="section-item">
                <a href="#">Rapports de ventes</a>
            </div>
            <div class="section-item">
                <a href="#">Analyse des performances</a>
            </div>
            <div class="section-item">
                <a href="#">Graphiques et visualisations</a>
            </div>
        </div>
    </section>

    <!-- Section Configuration -->
    <section class="section">
        <h2>Configuration du Site</h2>
        <div class="section-content">
            <div class="section-item">
                <a href="#">Paramètres généraux</a>
            </div>
            <div class="section-item">
                <a href="#">Méthodes de paiement</a>
            </div>
            <div class="section-item">
                <a href="#">Options de livraison</a>
            </div>
            <div class="section-item">
                <a href="#">Gestion des promotions</a>
            </div>
        </div>
    </section>

</main>

</body>
</html>
