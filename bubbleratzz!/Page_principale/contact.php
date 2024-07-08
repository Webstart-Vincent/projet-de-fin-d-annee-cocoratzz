<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .contact-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .contact-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .contact-map iframe {
            width: 100%;
            height: 500px;
            border: 0;
        }


        .contact-form {
            /* Styles pour le formulaire */
        }

        .contact-form form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .contact-form label {
            font-weight: bold;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form input[type="tel"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .contact-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .faq-section {
            margin-top: 40px;
        }

        .faq-section h2 {
            text-transform: uppercase; /* Mettre "FAQ" en majuscules */
            text-align: center; /* Centrer le contenu de la FAQ */
        }

        .faq-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc; /* Ajouter une ligne entre chaque FAQ pour plus de clarté */
            padding-bottom: 10px; /* Espacement entre les FAQ */
            position: relative; /* Position relative pour les flèches */
        }

        .faq-item:last-child {
            border-bottom: none; /* Supprimer la ligne en bas de la dernière FAQ */
        }

        .faq-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
            cursor: pointer;
            padding-right: 30px; /* Espace pour la flèche */
            position: relative; /* Position relative pour les flèches */
        }

        .faq-item h3::after {
            content: "\25B6"; /* Flèche vers la droite */
            font-size: 20px;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s ease; /* Animation de transition */
            pointer-events: none; /* Empêcher que la flèche ne soit cliquable */
            color: #007bff; /* Couleur de la flèche */
            z-index: 1; /* Assurez-vous que la flèche est au-dessus du texte */
        }

        .faq-item.active h3::after {
            transform: translateY(-50%) rotate(90deg); /* Tourner la flèche vers le bas */
        }

        .faq-item p {
            font-size: 16px;
            display: none; /* Masquer le paragraphe par défaut */
            margin-top: 10px; /* Espacement entre la question et la réponse */
        }

        .newsletter-section {
            margin-top: 40px;
            text-align: center;
        }

        .newsletter-section h4 {
            text-transform: uppercase;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .newsletter-form {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 400px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
        }

        .newsletter-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 0 4px 4px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php include '../nav/nav_contact.php'; ?> <!-- Inclure la navigation spécifique à la page de contact -->

    <div class="promo-bar">
    <div class="promo-text">
        Livraison gratuite à partir de 35€ d'achat – Soldes jusqu'à -70%
    </div>
    </div>

    <section class="contact-section">
        <div class="contact-header">
            <h1>CONTACT</h1>
        </div>
        <div class="contact-content">
            <div class="contact-map">
                <!-- Insérez votre carte (Google Maps, OpenStreetMap, etc.) ici -->
                <!-- Exemple de contenu fictif -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.1169023573946!2d2.296308815674073!3d48.98613717930154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66768f905f0b1%3A0x800db6747388a7a4!2s13%20Rue%20du%20Puits%20Grenet%2C%2095230%20Soisy-sous-Montmorency%2C%20France!5e0!3m2!1sen!2sus!4v1625558053853!5m2!1sen!2sus" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="contact-form">
                <h2>Formulaire de Contact</h2>
                <form action="traitement_formulaire.php" method="POST">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>

                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>

                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>

                    <label for="telephone">Téléphone :</label>
                    <input type="tel" id="telephone" name="telephone" required>

                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
        
        <div class="faq-section">
            <h2>FAQ</h2>
            <div class="faq-item">
                <h3>Quels sont les délais d'expédition et de livraison ?</h3>
                <p>Nos délais d'expédition varient en fonction du produit et de votre localisation. En général, les commandes sont expédiées sous 1 à 3 jours ouvrables après la confirmation de la commande. Pour les délais de livraison, cela dépend du mode de livraison choisi lors de votre commande. Vous pouvez consulter les détails spécifiques à la livraison dans votre confirmation de commande.</p>
            </div>
            <div class="faq-item">
                <h3>Quel est le montant des frais de port ?</h3>
                <p>Les frais de port sont calculés en fonction de votre adresse de livraison et du poids total de votre commande. Vous pouvez estimer les frais de port lors du processus de commande avant de finaliser votre achat. Nous offrons également la livraison gratuite pour les commandes dépassant un montant spécifique. Veuillez consulter notre page de commande pour plus de détails.</p>
            </div>
            <div class="faq-item">
                <h3>Quels moyens de paiement sont disponibles ?</h3>
                <p>Nous acceptons plusieurs méthodes de paiement pour votre commodité, y compris les cartes de crédit (Visa, MasterCard, American Express), les cartes de débit, ainsi que les paiements par PayPal et virement bancaire. L'option exacte disponible peut dépendre de votre région et sera affichée lors du processus de paiement.</p>
            </div>
            <div class="faq-item">
                <h3>Comment ajouter mes perles à mes boissons ?</h3>
                <p>Pour ajouter des perles à vos boissons, suivez ces étapes simples :
                    <br>
                    - Faites cuire les perles selon les instructions fournies sur l'emballage.
                    <br>
                    - Une fois cuites, rincez-les à l'eau froide pour les refroidir.
                    <br>
                    - Ajoutez-les à votre boisson préparée et remuez doucement pour une distribution uniforme.
                    <br>
                    - Servez immédiatement et profitez de votre bubble tea avec des perles fraîches !
                </p>
            </div>
            <div class="faq-item">
                <h3>Comment réaliser mes bubble tea moi-même ?</h3>
                <p>Vous pouvez facilement préparer votre bubble tea à la maison en suivant ces étapes générales :
                    <br>
                    - Préparez votre thé (noir, vert, ou autre) selon vos préférences.
                    <br>
                    - Ajoutez du sirop de saveur si désiré (par exemple, sirop de mangue, fraise, etc.).
                    <br>
                    - Ajoutez du lait ou une alternative au lait (lait d'amande, lait de coco) selon le goût.
                    <br>
                    - Ajoutez des perles cuites ou d'autres garnitures comme des fruits.
                    <br>
                    - Mélangez bien, ajoutez de la glace si désiré, et savourez votre bubble tea maison !
                </p>
            </div>
            <div class="faq-item">
                <h3>J'ai eu un produit en plus que je n'avais pas commandé, c'est normal ?</h3>
                <p>Nous nous excusons pour cet inconvénient. Si vous avez reçu un produit en plus dans votre commande, cela peut être dû à une erreur de notre part ou à une promotion en cours. Veuillez nous contacter immédiatement pour que nous puissions rectifier la situation et organiser le retour ou la récupération du produit supplémentaire.</p>
            </div>
            <!-- Ajoutez d'autres éléments FAQ selon vos besoins -->
        </div>
    </section>

    <script>
    const faqItems = document.querySelectorAll('.faq-item h3');

    faqItems.forEach(item => {
        item.addEventListener('click', function() {
            const parent = this.parentElement;
            parent.classList.toggle('active');
            const answer = parent.querySelector('p');
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';

            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.parentElement.classList.remove('active');
                    otherItem.nextElementSibling.style.display = 'none';
                }
            });
        });
    });
</script>

<!-- Section Newsletter -->
<section class="newsletter-section">
        <h4>Rejoignez la newsletter</h4>
        <div class="newsletter-form">
            <input type="email" id="newsletter-email" class="newsletter-input" placeholder="Entrez votre email...">
            <button type="submit" class="newsletter-submit">S'inscrire</button>
        </div>
    </section>

    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérez l'e-mail soumis
        $email = $_POST["email"];

        // Validation simple de l'e-mail (à améliorer selon vos besoins)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Veuillez fournir une adresse e-mail valide.</p>";
        } else {
            // Traitez l'e-mail ici (par exemple, enregistrez-le dans une base de données)
            echo "<p>Inscription réussie à la newsletter pour $email.</p>";
        }
    }
    ?>
    
    <?php include '../autre/footer_contact.php'; ?> <!-- Inclure le footer général -->

</body>
</html>

