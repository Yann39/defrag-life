//============================
// Change ou remet une couleur
//============================
function changeCouleur(ligne) {
	ligne.bgColor = '#5862D1';
}

function remetCouleur(ligne) {
	ligne.bgColor = '#70809F';
}

//============================================
// Fonction pour ouvrir les panoramas en popup
//============================================
function OuvrirPanorama(uairelle) {
	window.open(uairelle,"Panorama","height=470,width=620,scrollbars=no,resizable=no,left=80,top=80");
}

//===============================================
// Fonction pour ouvrir les infos joueur en popup
//===============================================
function OuvrirInfosJoueur(uairelle2) {
	window.open(uairelle2,"Player_infos","height=362,width=473,scrollbars=no,resizable=no,left=300,top=300");
}