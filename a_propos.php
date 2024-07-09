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

        .a_propos-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .a_propos-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .a_propos-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
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

        .promo-bar {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            font-size: 16px;
        }

        .promo-content {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .promo-content img {
            max-width: 150px;
            margin-right: 20px;
        }

        .promo-text-content {
            max-width: 800px;
        }

        .promo-text-content h2 {
            margin: 0;
            font-size: 24px;
        }

        .promo-text-content p {
            margin-top: 10px;
            font-size: 16px;
        }

        .problem-section {
            text-align: center;
            margin-top: 40px;
        }

        .problem-section h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .problem-form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .problem-textarea {
            width: 80%;
            max-width: 600px;
            height: 100px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .problem-submit {
            background-color: #5b7abf;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        .juridique-section {
            margin-top: 40px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .juridique-section h2 {
            text-transform: uppercase;
            margin-bottom: 20px;
            text-align: center; /* Centrage horizontal */
        }

        .juridique-item {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
            position: relative;
            text-align: left; /* Alignement du texte à gauche à l'intérieur des items */
        }

        .juridique-item:last-child {
            border-bottom: none;
        }

        .juridique-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
            cursor: pointer;
            padding-right: 30px;
            position: relative;
        }

        .juridique-item h3::after {
            content: "\25B6";
            font-size: 20px;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s ease;
            pointer-events: none;
            color: #007bff;
            z-index: 1;
        }

        .juridique-item.active h3::after {
            transform: translateY(-50%) rotate(90deg);
        }

        .juridique-item p {
            font-size: 16px;
            margin-top: 10px;
            display: none;
            padding-left: 20px;
        }

        .juridique-item.active p {
            display: block;
        }
    </style>
</head>
<body>
    <?php include '../nav/nav_contact.php'; ?>

    <div class="promo-bar">
        <div class="promo-text">
            Livraison gratuite à partir de 35€ d'achat – Soldes jusqu'à -70%
        </div>
    </div>

    <div class="promo-content">
        <img src="../asset/img/image_a_propos.jpg" alt="Image description">
        <div class="promo-text-content">
            <h2>Une boisson venue d'Asie</h2>
            <p>Le Bubble Tea apparaît pour la première fois dans les années 80, à Taiwan. De son vrai nom 珍珠奶茶 ou Thé au lait aux perles, le Bubble Tea est à l’origine confectionné à partir de thé noir Assam, de lait et de perles de tapioca. Aujourd’hui, cette boisson, fun, colorée et ludique, s’est démocratisée dans le monde entier, et notamment en France, où le Bubble Tea est devenu en quelques années une boisson vecteur de succès. Le Bubble Tea connaît désormais plusieurs formes. Autant de manières de le consommer que de saveurs différentes. Chaud ou froid, avec ou sans lait, perles de tapioca, perles de fruits : cette boisson sait répondre aux goûts de tous les consommateurs avides de nouvelles expériences gustatives.</p>
        </div>
    </div>

    <section class="problem-section">
        <h3>Quel est votre problème ?</h3>
        <form class="problem-form" method="post" action="">
            <textarea class="problem-textarea" placeholder="Décrivez votre problème..." name="problem"></textarea>
            <button type="submit" class="problem-submit">Envoyer</button>
        </form>
    </section>

    <div class="juridique-section">
        <h2>Document Juridique</h2>
        <div class="juridique-item">
            <h3>Conditions d’utilisation</h3>
            <p>Bienvenue sur le site web de Bubble Tea France. Veuillez lire attentivement ces conditions d'utilisation ("Conditions") avant d'utiliser ce site web.

Acceptation des Conditions
En accédant ou en utilisant ce site web, vous acceptez d'être lié par ces Conditions et notre Politique de confidentialité. Si vous n'acceptez pas toutes les conditions et termes de cette politique, veuillez ne pas utiliser ce site.

Utilisation du Site
Vous devez avoir au moins 18 ans pour utiliser ce site. En utilisant ce site et en acceptant ces Conditions, vous déclarez et garantissez que vous avez au moins 18 ans.

Modifications
Nous nous réservons le droit de modifier ces Conditions à tout moment. Les modifications entreront en vigueur dès leur publication sur le site. Il est de votre responsabilité de vérifier régulièrement les mises à jour. En continuant à utiliser le site après la publication des modifications, vous acceptez les nouvelles Conditions.

Propriété Intellectuelle
Le contenu de ce site, y compris mais sans s'y limiter, le texte, les graphiques, les images, les logos, les boutons, les icônes, les vidéos et le code, est la propriété de Bubble Tea France ou de ses fournisseurs de contenu, et est protégé par les lois françaises et internationales sur le droit d'auteur.

Utilisation Autorisée
Vous pouvez accéder et utiliser ce site uniquement à des fins légales et conformément à ces Conditions. Vous acceptez de ne pas utiliser ce site de manière à porter atteinte aux droits d'autrui, y compris les droits de propriété intellectuelle ou de confidentialité.

Contenu Utilisateur
En soumettant du contenu sur ce site (par exemple, commentaires, avis, photos), vous accordez à Bubble Tea France une licence mondiale, non exclusive, transférable, libre de redevances et irrévocable pour utiliser, reproduire, modifier, publier, distribuer et afficher ce contenu.

Liens vers des Sites Tiers
Ce site peut contenir des liens vers des sites web de tiers. Ces liens sont fournis uniquement pour votre commodité. Bubble Tea France n'endosse pas et n'est pas responsable du contenu, de la précision ou des pratiques de sécurité de ces sites web tiers.

Limitation de Responsabilité
Dans les limites permises par la loi applicable, Bubble Tea France décline toute responsabilité découlant de l'utilisation de ce site, y compris mais sans s'y limiter, pour tout dommage direct, indirect, spécial, consécutif ou punitif.

Indemnisation
Vous acceptez d'indemniser, de défendre et de dégager de toute responsabilité Bubble Tea France, ses dirigeants, administrateurs, employés, agents et tiers fournisseurs de contenu contre toute réclamation, responsabilité, dommage, perte ou coût, y compris les honoraires raisonnables d'avocat, résultant de votre violation de ces Conditions.

Disponibilité du Site
Nous nous efforçons de maintenir la disponibilité du site, mais nous ne garantissons pas que le site sera disponible sans interruption, en temps opportun, sécurisé ou exempt d'erreurs.

Loi Applicable
Ces Conditions sont régies par et interprétées conformément aux lois de la France, sans égard aux principes de conflit de lois.

Contact
Pour toute question concernant ces Conditions, veuillez nous contacter à l'adresse email suivante : bubbleratzz@gmail.com.</p>
        </div>
        <div class="juridique-item">
            <h3>Mentions légales</h3>
            <p>Éditeur du site
Bubble Tea France
Société par Actions Simplifiée au capital de 100 000 euros
Siège social : 123 Rue du Bubble, 75000 Paris, France
Tél : +33 1 23 45 67 89
Email : bubbleratzz@gmail.com
RCS Paris 123 456 789
Numéro de TVA : FR 12 345 678 901

Directeur de la publication
Jeanne Doe

Hébergeur du site
Nom de l'hébergeur
Adresse de l'hébergeur
Tél : +33 1 23 45 67 89

Propriété intellectuelle
Tous les contenus présents sur ce site, incluant mais non limité aux textes, graphiques, logos, icônes, images, clips audio et vidéo, sont la propriété exclusive de Bubble Tea France ou de ses fournisseurs de contenu, et sont protégés par les lois françaises et internationales sur la propriété intellectuelle.

Collecte et utilisation des données personnelles
Pour plus d'informations sur la collecte et l'utilisation de vos données personnelles, veuillez consulter notre Politique de confidentialité.

Cookies
Ce site utilise des cookies pour améliorer votre expérience de navigation. En continuant à utiliser ce site, vous consentez à l'utilisation de ces cookies.

Liens vers des sites tiers
Ce site peut contenir des liens vers des sites web de tiers. Bubble Tea France n'endosse pas et n'est pas responsable du contenu ou des pratiques de sécurité de ces sites web.

Limitation de responsabilité
Bubble Tea France s'efforce de fournir des informations précises et à jour sur ce site, mais ne garantit pas l'exactitude, l'exhaustivité ou la pertinence des informations fournies. En utilisant ce site, vous acceptez que Bubble Tea France ne soit pas responsable des dommages directs, indirects, spéciaux, consécutifs ou punitifs résultant de l'utilisation ou de l'incapacité d'utiliser ce site.

Modification des mentions légales
Bubble Tea France se réserve le droit de modifier les présentes mentions légales à tout moment. Les modifications entreront en vigueur dès leur publication sur ce site.

Droit applicable
Les présentes mentions légales sont régies par et interprétées conformément aux lois françaises.

Contact
Pour toute question concernant les présentes mentions légales, veuillez nous contacter à l'adresse email suivante : bubbleratzz@gmail.com.

</p>
        </div>
        <div class="juridique-item">
            <h3>Conditions générales de vente</h3>
            <p>1. Champ d'application
Les présentes Conditions Générales de Vente (CGV) s'appliquent à toutes les ventes de produits effectuées sur le site internet de Bubble Tea France, accessible à l'adresse www.bubbletea-france.com.

2. Commandes
2.1. Pour passer une commande, l'utilisateur doit créer un compte client sur le site ou s'identifier s'il possède déjà un compte.
2.2. Toute commande implique l'acceptation intégrale et sans réserve des présentes CGV.
2.3. Bubble Tea France se réserve le droit de refuser ou d'annuler toute commande pour des motifs légitimes, notamment en cas de non-paiement ou de suspicion de fraude.

3. Produits
3.1. Les produits proposés à la vente sont ceux décrits sur le site au moment de la commande.
3.2. Les photographies et illustrations présentées sur le site sont non contractuelles.

4. Prix
4.1. Les prix des produits sont indiqués en euros toutes taxes comprises (TTC).
4.2. Bubble Tea France se réserve le droit de modifier les prix à tout moment, tout en garantissant l'application du prix en vigueur au moment de la commande.

5. Paiement
5.1. Le paiement s'effectue en ligne par carte bancaire ou tout autre moyen de paiement accepté par le site.
5.2. Le paiement est sécurisé et toutes les informations transmises sont cryptées.
5.3. En cas de non-paiement, la commande est automatiquement annulée.

6. Livraison
6.1. Les produits sont livrés à l'adresse indiquée par l'utilisateur lors de la commande.
6.2. Les délais de livraison sont indiqués lors de la commande et peuvent varier en fonction de la destination.
6.3. En cas de retard de livraison, l'utilisateur en est informé par email.

7. Droit de rétractation
7.1. Conformément à la législation en vigueur, l'utilisateur dispose d'un délai de 14 jours pour exercer son droit de rétractation sans avoir à justifier de motifs ni à payer de pénalités.
7.2. Le droit de rétractation peut être exercé en contactant Bubble Tea France à l'adresse bubbleratzz@gmail.com.

8. Garanties
8.1. Les produits vendus sont garantis contre tout défaut de conformité ou vice caché conformément à la législation en vigueur.
8.2. Pour toute réclamation au titre de la garantie, l'utilisateur peut contacter Bubble Tea France à l'adresse bubbleratzz@gmail.com.

9. Responsabilité
9.1. La responsabilité de Bubble Tea France ne peut être engagée en cas d'inexécution ou de mauvaise exécution du contrat due à un cas de force majeure.
9.2. Bubble Tea France ne saurait être tenue responsable des dommages indirects ou immatériels résultant de l'utilisation des produits vendus sur le site.

10. Modification des CGV
10.1. Bubble Tea France se réserve le droit de modifier les présentes CGV à tout moment. Les CGV applicables sont celles en vigueur au moment de la commande.

11. Droit applicable et litiges
11.1. Les présentes CGV sont régies par le droit français.
11.2. En cas de litige, une solution amiable sera recherchée. À défaut, les tribunaux français seront seuls compétents.

12. Contact
Pour toute question concernant les Conditions Générales de Vente, veuillez nous contacter à l'adresse email suivante : bubbleratzz@gmail.com.</p>
        </div>
        <div class="juridique-item">
            <h3>Politique de confidentialité</h3>
            <p>1. Collecte des informations
1.1. Bubble Tea France collecte les informations personnelles des utilisateurs lors de leur inscription sur le site, de la passation de commande, de l'inscription à la newsletter ou de toute autre interaction avec le site.
1.2. Les informations collectées peuvent inclure le nom, l'adresse email, l'adresse postale, le numéro de téléphone, les données de paiement, ainsi que d'autres informations nécessaires à la gestion des commandes et à la personnalisation de l'expérience utilisateur.

2. Utilisation des informations
2.1. Les informations collectées sont utilisées pour traiter les commandes, livrer les produits, communiquer avec les utilisateurs, personnaliser leur expérience sur le site, et fournir des informations sur les produits et services.
2.2. Les informations personnelles peuvent également être utilisées à des fins de marketing direct, sous réserve du consentement préalable de l'utilisateur.

3. Protection des informations
3.1. Bubble Tea France met en œuvre des mesures de sécurité appropriées pour protéger les informations personnelles contre tout accès non autorisé, toute utilisation abusive, toute divulgation non autorisée, toute altération ou destruction.
3.2. Les informations de paiement sont cryptées à l'aide de la technologie SSL (Secure Socket Layer) et ne sont pas stockées sur nos serveurs.

4. Partage des informations
4.1. Bubble Tea France ne vend pas, ne loue pas et ne commercialise pas les informations personnelles des utilisateurs à des tiers.
4.2. Les informations personnelles peuvent être partagées avec des prestataires de services tiers (par exemple, des transporteurs) afin de fournir les services demandés par l'utilisateur.

5. Cookies
5.1. Le site utilise des cookies pour améliorer l'expérience utilisateur et analyser la performance du site.
5.2. Les utilisateurs peuvent contrôler l'utilisation des cookies via les paramètres de leur navigateur. Le refus des cookies peut cependant limiter certaines fonctionnalités du site.

6. Droits des utilisateurs
6.1. Les utilisateurs ont le droit d'accéder à leurs informations personnelles, de les rectifier, de les supprimer ou de restreindre leur traitement.
6.2. Les utilisateurs peuvent exercer leurs droits en contactant Bubble Tea France à l'adresse bubbleratzz@gmail.com.

7. Modifications de la politique
7.1. Bubble Tea France se réserve le droit de modifier la présente politique de confidentialité à tout moment. Les modifications seront publiées sur cette page et entreront en vigueur dès leur publication.

8. Contact
Pour toute question concernant la politique de confidentialité, veuillez nous contacter à l'adresse email suivante : bubbleratzz@gmail.com.

</p>
            <br> <!-- La balise <br> est correcte ici pour un saut de ligne entre les sections -->
        </div>
    </div>

    <script>
    const faqItems = document.querySelectorAll('.juridique-item h3');

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

    <section class="newsletter-section">
        <h4>Rejoignez la newsletter</h4>
        <div class="newsletter-form">
            <input type="email" id="newsletter-email" class="newsletter-input" placeholder="Entrez votre email...">
            <button type="submit" class="newsletter-submit">S'inscrire</button>
                    <!-- {% with messages = get_flashed_messages(with_categories=true) %}
            {% if messages %}
                <ul class="flashes">
                {% for category, message in messages %}
                    <li class="{{ category }}">{{ message }}</li>
                {% endfor %}
                </ul>
            {% endif %}
        {% endwith %} -->
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
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
    </section>

    <?php include '../autre/footer_contact.php'; ?>
</body>
</html>
