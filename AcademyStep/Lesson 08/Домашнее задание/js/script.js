function finddd(){
	var textFind = form.text1.value;
//var textFind2 = "azazaz";

	if (textFind.indexOf("'") != -1) {
		span1.innerHTML="Вы ввели недопустимые символы!!!";
		mess.style.background = "white";
	}
	else {
		span1.innerHTML="";
		mess.style.background = "#33FFFF";
	}
}

function spanFunction()
{
	span1.innerHTML="<input type='button' name='azaza' value='azaz'> ";
	form.text1.value = "aloha";
}