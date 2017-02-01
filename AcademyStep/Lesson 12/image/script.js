var massiv = new Array();
//"img/gruha.jpg", "img/klubnika.jpg", "img/malina.jpg", "img/vihnya.jpg"
var i = 0;


function nextImage(elem) {
	i++;
	if(i==massiv.length)
		i = 0;

	document.images[elem].src=massiv[i];

}
