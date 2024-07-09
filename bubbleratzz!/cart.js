// Sélection des éléments du DOM
const submitButton = document.querySelector('[type="submit"]');
const dialog = document.querySelector("dialog");
const form = document.querySelector("dialog form");
const cartButton = document.querySelector(".cart");
let cartLength = 0;

// Récupération de cartLengthContainer après sa définition
const cartLengthContainer = document.querySelector(".cart>span");

// Fonction pour mettre à jour l'interface utilisateur du panier
const setCartUI = () => {
    if (cartLength > 0) cartLengthContainer.classList.add("show");
    else cartLengthContainer.classList.remove("show");

    cartLengthContainer.innerText = cartLength;
    updateCartInput(); // Mettre à jour l'input à chaque changement
};

// Écouteur d'événement sur le bouton de soumission (simulé)
submitButton.addEventListener("click", () => {
    cartLength++;
    setCartUI();
});

// Écouteur d'événement sur le bouton du panier
cartButton.addEventListener("click", () => {
    console.log("Clicked on cart icon");
    dialog.showModal();
});

// Récupération de l'élément d'entrée du panier
const cartInput = document.querySelector('input[type="number"]');

// Mettre à jour cartLength lors de la soumission du formulaire
form.addEventListener("submit", (event) => {
    event.preventDefault(); // Empêcher la soumission du formulaire
    cartLength = parseInt(cartInput.value); // Mettre à jour cartLength avec la valeur de l'entrée
    setCartUI(); // Mettre à jour l'interface utilisateur
    dialog.close(); // Fermer la boîte de dialogue
});

// Fonction pour mettre à jour l'entrée du panier
const updateCartInput = () => {
    cartInput.value = cartLength;
};

// Ajouter une icône de corbeille à côté de l'entrée du panier
const cartIcon = document.createElement("i");
cartIcon.classList.add("fas", "fa-trash-alt", "cart-icon");
form.appendChild(cartIcon);

// Ajouter deux autres entrées dans le formulaire
const input2 = document.createElement("input");
input2.setAttribute("type", "text");
input2.setAttribute("id", "input2");
input2.setAttribute("name", "input2");
input2.setAttribute("placeholder", "Input 2");
form.appendChild(input2);

const input3 = document.createElement("input");
input3.setAttribute("type", "text");
input3.setAttribute("id", "input3");
input3.setAttribute("name", "input3");
input3.setAttribute("placeholder", "Input 3");
form.appendChild(input3);

// Mettre à jour l'entrée du panier au chargement de la page (décommentez si nécessaire)
// updateCartInput();
