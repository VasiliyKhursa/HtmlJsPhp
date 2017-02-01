var foo = 'String'; 							// Переменная в глобальной области

console.log(foo);								// выводим переменную в консоль
console.log("window.foo = " + window.foo);
//window.open("http://google.com");  			// открытие нового окна
console.log(navigator.userAgent);				// вся инфа о браузере
console.log(navigator.platform);
															// информация о платформе ПК  (например WIN32)
console.log("width:" + window.screen.width + " " + "height:" + screen.height + " "); 		// информация о экране

console.log(location); 							// содержит информацию о текущем URL
//console.log(location.reload());					// перезагрузка страницы
console.log(location.toString());				// выводит текущий URL страницы

console.log(frames);							// можно увидеть все фреймы

console.log(history);							// позволяет увидеть историю переходов.

window.alert('BOM'); 							// вывод сообщения
window.confirm('Подтвердить?');  				// сообщение вида "ОК/ОТМЕНА";  возвращает значение TRUE/FALSE
var bar = window.prompt('Ввведите:');		   	// диалоговое окно позволяет ввести строковую строку, возвращает строковую строку

if (bar === 'Привет') {
	window.alert("Привет и тебе от BOM!");
}
else {
	window.alert('Пока');
}