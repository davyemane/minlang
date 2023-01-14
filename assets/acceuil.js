// recuperation des données
var valider = document.getElementById('valider'); //récupère le bouton de validation
var login = document.getElementById('login'); //récupère le login
var password = document.getElementById('mot_de_passe'); //récupère le mot de passe
var lien = document.querySelector('a'); //appelle le lien d'inscription

//definit la couleur du lien lorqu'on passe dessus
lien.addEventListener('mouseover', couleur1)

function couleur1() {
    this.style.backgroundColor = '#AA69A7';
}
lien.addEventListener('mouseout', decolore)

function decolore() {
    this.style.backgroundColor = '#68456D';
}


