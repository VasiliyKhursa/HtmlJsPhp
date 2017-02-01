var massiv = new Array("img/gruha.jpg", "img/klubnika.jpg", "img/malina.jpg", "img/vihnya.jpg");
var i = 0;


function mover (elem) {
	document.images[elem].width=400;
 	document.images[elem].height=300;
}

function mout (elem) {
	document.images[elem].width=200;
 	document.images[elem].height=150;

}

function mup () {
	document.getElementById('img_gruha').style.border = "none";

}

function mdown () {
	img_gruha.style.border="2px solid green";

}

function nextImage(elem) {
	i++;
	if(i==massiv.length)
		i = 0;

	document.images[elem].src=massiv[i];

}


