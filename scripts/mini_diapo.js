/* Nom : HERIPRET
   Prenom : Estelle
   Groupe : 3
   Mini diaporama de la page d'accueil
 */
var tabImages = ["./images2/thumbnails/th-JKe5DL.jpg",
		 "./images2/thumbnails/th-mVRACG.jpg",
		 "./images2/thumbnails/th-DEe6EA.jpg",];
		 
var indiceImage = 1;

/* afficheImage : affiche l'image d'indice x de tabImages
Parametres :
x : un nombre
Resultat : image d'indice x
*/
var afficheImage = function(x) {
    var imag = document.getElementById("slides");
    imag.src = tabImages[x];
    indiceImage = x;
}

/* imageSuivante : affiche image suivante
Parametres :

Resultat : image suivante du tableau tabImages
*/
var imageSuivante = function() {
    if (indiceImage <tabImages.length) {
        afficheImage(indiceImage);
        indiceImage=indiceImage+1;
        if (indiceImage==tabImages.length) {
            indiceImage=0;
        }
    }
}

var monTimer = window.setInterval(imageSuivante,4000);