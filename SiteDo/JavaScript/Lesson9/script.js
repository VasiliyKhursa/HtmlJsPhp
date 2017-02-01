
function prov() {
     if (document.forma1.elements[4].checked && document.forma1.elements[6][3].selected) {
       alert ("Мужчина, который любит животных заслуживает уважения.");
     }
     else if (document.forma1.elements[5].checked && document.forma1.elements[6][4].selected) {
       alert ("Женщина за рулем всегда вызывает интерес.");
     }
     else {
       alert ("Отличное увлечение.");
     }
}

function prov2() {
	var a=document.forma1.elements[2].value;
	var b=document.forma1.elements[3].value;
	if (a==b) {
		alert ("Вы зарегистрированы!");
	}
	else {
		alert ("Введите правильный пароль.");
	}
}
