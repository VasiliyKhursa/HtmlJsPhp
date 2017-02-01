function go(txt) {
	console.log(txt);
	tex.innerHTML = content;										// востанавливаем текст из глобальной переменной
	var pos = content.indexOf(txt);
    var rng = document.createRange(); 								// создем Ренж
	var i = 0;
	var rsp2 = document.getElementById("tex").childNodes[i];

	while (pos != -1) {

		//console.log(pos);											// выводим начальную позицию поискового слова в тексте
		//console.log(txt.length);									// выводим ширину поискового слова

		rng.setStart(rsp2, pos); 									// делаем выделение
		rng.setEnd(rsp2, pos + txt.length);							// делаем выделение

		//console.log(rng.toString());
		//rng.deleteContents();

		var el_new = document.createElement("a");					// создаем элемент
		el_new.setAttribute("style", "background-color: red");		// устанавливаем стиль выделения найденного слова

		rng.surroundContents(el_new);								// оборачиваем ренж созданным элементом

		i += 2;														// идем дальше по тексту - через два потомка
		rsp2 = document.getElementById("tex").childNodes[i];
		var new_content = rsp2.textContent;
		pos = new_content.indexOf(txt);
	}
}