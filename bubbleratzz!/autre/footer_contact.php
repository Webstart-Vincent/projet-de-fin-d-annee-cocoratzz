<footer>
    <div class="footer-section">
        <section class="reseaux_sociaux">
            <p>Réseaux Sociaux</p>
            <div class="reseaux_sociaux_image">
                <img src="../asset/reseaux_sociaux/instagram.svg" alt="reseau social instagram">
                <img src="../asset/reseaux_sociaux/threads.svg" alt="reseau social threads">
                <img src="../asset/reseaux_sociaux/twitter.svg" alt="reseau social twitter">
                <img src="../asset/reseaux_sociaux/facebook.svg" alt="reseau social facebook">
            </div>
            <p>Bubble_Ratzz</p>
        </section>
    </div>

    <div class="footer-section">
        <section class="livraison">
            <p>Faites vous livrer</p>
            <img src="../asset/livraison/uber_eat.svg" alt="livraison uber eat">
            <img src="../asset/livraison/delivroo.svg" alt="livraison delivroo">
            <img src="../asset/livraison/just_eat.svg" alt="livraison just eat">
        </section>
    </div>
    
    <section class="contact-section">
        <p class="contact-paragraph">Bubble Ratzz vous propose des Bubble Tea uniques aux saveurs variées et délicieuses 7 jours sur 7.</p>
        <div class="contact-details">
            <div class="adress">
                <img src="../asset/contact/map.svg" alt="adresse">
                <p class="contact-paragraph">13 rue du puits grenet 95230 Soisy-sous-Montmorency</p>
            </div>
            <div class="phone">
                <img src="../asset/contact/phone.svg" alt="telephone">
                <p class="contact-paragraph">07.68.46.65.28</p>
            </div>
            <div class="mail">
                <img src="../asset/contact/mail.svg" alt="mail">
                <p class="contact-paragraph">bubbleratzz@gmail.com</p>
            </div>
        </div>
    </section>
    <p class="copyright">&copy; 2024 Bubble Ratzz. Tous droits réservés.</p>
</footer>

<style>
    footer {
    display: flex;
    justify-content: space-between; /* Espacement équivalent entre les sections */
    align-items: flex-start;
    flex-wrap: wrap;
    padding: 20px;
    background: linear-gradient(90deg, #5b7abf 0%, #3a997f 100%);
    text-align: center;
    min-height: 150px;
    box-sizing: border-box;
    margin-top: 40px; /* Ajout de marge en haut */
}

.footer-section {
    flex: 1;
    margin: 10px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.footer-section section {
    text-align: center;
}

.footer-section img {
    margin: 5px; /* Ajustement des marges entre les images */
}

.contact-details {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: flex-start;
    padding-left: 40px;
}

.contact-details div {
    display: flex;
    align-items: center; /* Alignement vertical */
    gap: 20px; /* Espacement entre les éléments */
}

.contact-paragraph {
    margin: 0 0 10px 0;
}

.copyright {
    width: 100%;
    text-align: center;
    margin-top: 20px;
    font-family: "Raleway", sans-serif;
    font-size: 16px;
    font-weight: 400;
}

/* Specific style for social media icons in footer */
.reseaux_sociaux_image img {
    margin-right: 30px; /* Ajustement de la marge à droite des icônes */
}
</style>