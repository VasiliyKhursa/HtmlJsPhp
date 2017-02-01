(function (){

	var elements = document.getElementsByTagName("p");    				// коллекция - HTMLCollection, работает быстрее чем  document.querySelectorAll
    var classElements = document.getElementsByClassName("paragraph");	// поиск елементов по классу, работает быстрее
	var idElements = document.getElementById("four");					// поиск элементов по ID, работает быстрее чем document.querySelector("#four");

	var elementSelector = document.querySelector("p"); 					// ищет первый элемент с тегом
	var elementsSelector = document.querySelectorAll("p");				// ищет все элементы  коллекция - NideList.
	var elementsSelectorInDiv = document.querySelectorAll("div p");		// но данный метод позволяет легко искать вложеные элементы
 	var elementSelectorById = document.querySelector("#four");			// ищет элемент по ID



	console.log(elements);
	console.log(classElements);
	console.log(idElements);
	console.log(elementSelector);
	console.log(elementsSelector);
	console.log(elementsSelectorInDiv);
	console.log(elementSelectorById);

	for (var i = 0; i < elements.length; i++) {
        console.log(elements[i].tagName,  								// получаем имя тега. не работает с текстовыми узлами
					elements[i].parentNode,								// получаем имя родителя
					elements[i].nodeName, 								// имя узла;более универсальноечем tagName. работает с текстовыми узлами
					elements[i].nodeType 								// тип узла
					);
		//console.log();
	}


    var elementDiv = document.querySelector("div"); 					// все дочерние узлы
	var elementBody = document.querySelector("body"); 					// все дочерние узлы
	console.log(elementDiv.childNodes);									// все узлы
	console.log(elementDiv.children);									// все теги
	console.log(elementBody.childNodes);								// все узлы, включая пробелы
	console.log(elementBody.children); 									// все теги, не включает пробелы
	console.log(elementBody.firstChild);								// первый узел,
	console.log(elementBody.lastChild); 								// последний узел

    console.log(elementBody.innerHTML);									// выводит содержимое узла body

})();
