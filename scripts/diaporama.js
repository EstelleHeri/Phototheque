/* Nom : HERIPRET
   Prenom : Estelle
   Groupe : 3
   Diaporama
 */

// les évenements
/* setupListeners : mise en place des évenements 
    Paramètres : aucun
    Résultat : mise en place des évenements du diaporama
*/

var setupListeners = function() {  

    var elm = document.getElementById("button_right");   
    elm.addEventListener("click",next);
	var photo = document.getElementById("photos");
	photo.addEventListener("click",ouvre);
	var element = document.getElementById("croix");
	element.addEventListener("click",fermer);
}
 
window.addEventListener("load",setupListeners);   

/* next : affiche l'image suivante
    Paramètres : aucun
    Résultat : affiche l'image suivante
*/

var next = function() {

}

/* ouvre : ouvre le diaporama
    Paramètres : aucun
    Résultat : ouvre le diaporama
*/
var ouvre = function() {
	var overlay = document.getElementById("overlay");
	overlay.style.display = "block";
	var diapo = document.getElementById("slider");
	diapo.style.display = "block";
}

/* fermer : ferme le diaporama
    Paramètres : aucun
    Résultat : ferme le diaporama
*/
var fermer = function() {
	var overlay = document.getElementById("overlay");
	overlay.style.display = "none";
	var diapo = document.getElementById("slider");
	diapo.style.display = "none";
}