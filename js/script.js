// script.js

var divAjoutee = false;
const modify = null

function ajouterDivAvecFormulaire() {
    // Vérifier si la div a déjà été ajoutée
    if (!divAjoutee) {
        // Création de la div avec la classe "container"
        modify = `
            <div class="post-form">
            <form action="#" method="post" class="postForm">
                <textarea placeholder="Entrez votre texte ici" name="contenu"></textarea>
                <button type="submit">Modifier</button>
                <button type="button">Annuler</button>
            </form>
            </div>
        `
        // Création du bouton "Modifier"
        var boutonModifier = document.createElement('button');
        boutonModifier.innerHTML = 'Modifier';
        boutonModifier.setAttribute('type', 'submit');
        
        // Création du bouton "Annuler"
        var boutonAnnuler = document.createElement('button');
        boutonAnnuler.innerHTML = 'Annuler';
        boutonAnnuler.setAttribute('type', 'button');
        boutonAnnuler.addEventListener('click', function() {
            // Supprimer la div lorsque le bouton "Annuler" est cliqué
            nouvelleDiv.remove();
            // Mettre à jour la variable divAjoutee
            divAjoutee = false;
        });
        
        // Ajout du textarea et des boutons au formulaire
        formulaire.appendChild(textarea);
        formulaire.appendChild(boutonModifier);
        formulaire.appendChild(boutonAnnuler);
        
        // Ajout du formulaire à la div
        nouvelleDiv.appendChild(formulaire);
        
        // Ajout de la div au body
        document.body.appendChild(nouvelleDiv);
        
        // Mettre à jour la variable divAjoutee
        divAjoutee = true;
    }
}
