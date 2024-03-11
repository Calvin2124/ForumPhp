
// Sélectionner le bouton d'ouverture de la modal
var open_modal_btn = document.querySelector("#edit");
const close_btn = document.querySelector(".close")

// Écouter l'événement de clic sur le bouton pour ouvrir la modal
open_modal_btn.addEventListener("click", function() {
    modal.style.display = "block";
});

// Écouter l'événement de clic sur le bouton de fermeture
close_btn.addEventListener("click", function() {
    modal.style.display = "none";
});

