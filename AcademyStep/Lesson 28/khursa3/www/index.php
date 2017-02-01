<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="ajax_post_get_jq.js "></script>
</head>
<body>
<form name="form1">  <!-- БЕЗ method="post" И БЕЗ action="sum.php", ХОТЬ ОН И НА ДРУГОЙ СТРАНИЦЕ!!! -->
<input type="text" name="param1" value="5"><br>
<input type="text" name="param2" value="3"><br>
<input type="button" value="Сложить" onclick="post_send(param1.value, param2.value)"> <!-- КНОПКА НЕ type="submit", А type="button" (type="submit" ВСЕГДА ПРИВЕДЕТ К ПЕРЕЗАГРУЗКЕ СТРАНИЦЫ), ПРИ НАЖАТИИ – ВЫЗОВ ФУНКЦИИ post_send(param1.value, param1.value) ИЗ AJAX, параметры – значения текстовых полей!!! -->
<input type="button" value="Сложить JQ" onclick="jquery_send(param1.value, param2.value)">
</form>
<b><span id="summa"></span></b> <!-- РЕЗУЛЬТАТ ВСЕ РАВНО БУДЕТ НА ЭТОЙ ЖЕ СТРАНИЦЕ, НЕЗАВИСИМО ОТ ТОГО, ЧТО СКРИПТ PHP НАХОДИТСЯ НА ДРУГОЙ СТРАНИЦЕ -->
<script>
var req; // переменная для объекта XMLHttpRequest() - глобальная
// ОТПРАВКА - пользовательская функция post_send() 
function post_send(value1, value2) { // функция принимает value текстовых полей
// ПЕРВЫЙ ЭТАП - создаем объект XMLHttpRequest()
req=new XMLHttpRequest(); 
// ВТОРОЙ ЭТАП – создаем запрос POST– запрос 
req.open('GET', 'sum_get.php?param1='+value1+'&param2='+value2, true); // создаем - GET – запрос, sum.php - выполняемый POST- скрипт php, true – асинхронная передача (false - синхронная – до получения ответа от сервера пользователь ничего не сможет сделать на странице – поэтому применяется крайне редко)
// ТРЕТИЙ ЭТАП – инициализируем функцию приема результата (в т.ч. – проверки при приеме)
req.onreadystatechange=func_response; // func_response – задание функции проверки и получения ответных данных (отрабатывается позже)
// ЧЕТВЕРТЫЙ ЭТАП – добавляет http-заголовок (только для POST!!!) - 
//req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
// ПЯТЫЙ ЭТАП – «упаковываем» (создаем) http - запрос
//var str='param1='+value1+'&param2='+value2; // отправляемые входные данные необходимо «упаковать» в строку типа http
// ШЕСТОЙ ЭТАП – передаем запрос POST на сервер
req.send(); // передаем – отправка запроса на сервер
}
// ПРИЕМ - функция func_response
function func_response() {
// ПЕРВЫЙ ЭТАП – проверка кода готовности сервера и кода ответа сервера
if(req.readyState == 4) { // свойство readyState - код готовности сервера, значение 4 – «обработка запроса» (первое стандартное условие для получения ответа)
    if (req.status == 200) {  // свойство status – код ответа сервера, значение 200 – «запрос обработан успешно» (второе стандартное условие для получения ответа)
// ВТОРОЙ ЭТАП – получение ответа сервера
      summa.innerHTML = req.responseText; // свойство responseText – получение ответа сервера в виде строки и вывод в span (В ДАННОМ СЛУЧАЕ)
    }
}
}

	function jquery_send(value1, value2) {
         $.ajax({type:"post", url:"sum.php", data:"param1="+value1+"&param2="+value2, success:function(data){alert(data); $('#summa').html(data)}});
	}
</script>
</body>
</html>
