/*
function cl(elem){
	event.cancelBubble=true;
    elem.style.backgroundColor="green";
	alert("lol");
}
*/

function wasd(elem){
    elem.style.backgroundColor="green";
}


function disp(elem){

	if (elem.style.display != "block") {
		elem.style.display = "block";
		event.srcElement.innerText = "Скрыть";
	}
	else {
		elem.style.display = "none";
		event.srcElement.innerText = "Отобразить";  // получаем доступ к элементу, на который нжаали
	}
}




function kp(ev){
	ev = ev || event;												// так будет совсем круто
	if ((ev.which == 49) || (ev.keyCode == 49)) {				// номеер нажаатой клаавиши,  e.keyCode - нужно для IE
        primer1.style.display = "block";					// доступ по id, так как парраметров функции нет
		ssilka.innerText = "Отобразить";
	}
	else {
		ssilka.innertText = "Скрыть";
    	primer1.style.display = "none";
	}
	//alert(event.which);
}




////////////////////////////////////////////////////////////////////////




function funcDown(elem) {
	elem.style.color = "green";

}

function funcUp(elem) {
	elem.style.color = "#262d8d";

}

function funcOut(elem) {
	elem.style.backgroundColor = "#889296";
	event.srcElement.innerText = "Span";
}

function funcOver(elem) {
	elem.style.backgroundColor = "black";
}


////////////////////////////////////////////////////////////////////




function funcOnDown(elem) {
	if (!isMouseDown) {
		isMouseDown = elem;
		offX = event.offsetX;		// координаты относительно блока
		offY = event.offsetY;
	}
}

function funcOnUp() {
	isMouseDown = null;
}


function funcMouseMove(elem) {
	if (isMouseDown)  {
	   isMouseDown.style.left = event.clientX - offX + 'px';  // event.clientX - координата мыши относительно экрана
	   isMouseDown.style.top = event.clientY - offY + 'px';
	}
}

function dat() {
	var d = new Data();

	d.getDate();
}