<div id="forma">
<form>
<input type="button" value="Автомобили" name="auto" onclick='post_send("tbod","algoritm.php",[this.name],[]);'>
<input type="button" value="Запчасти" name="zapcasti" onclick='post_send("tbod","algoritm.php",[this.name],[]);'>
<input type="button" value="Запчасти" name="zapcasti" onclick='post_send_1(this.name);'>
</form>
</div>

     <script>

    var req;

	     function post_send_1(name) {

             req = new  XMLHttpRequest();													// создаем объект
			 req.open('POST', 'algoritm.php', true);										// запускаем AJAX, true - асинхронный
			 req.onreadystatechange = func_response;										// функция обработчик приема данных
			 req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');		// необходимо только для POST
			 var str = name + '=';   														// составлем URL строку
			 req.send(str);																	// отправляем?

	     }

         function func_response() {
             if (req.readyState == 4 && req.status == 200) {     // 200 - сервер отдал, 4 - сервер был готов
                tbod.innerHTML = req.responseText;
				func_fon(); 								//
             }
         }

		function func_fon() {
        	var rtd = document.getElementsByTagName("td");

			for (var i = 0; i < rtd.length; i++) {
				rtd[i].style.backgroundColor = "olive";
			}
		}
/*
		function func_fon_tbod() {
        	var rtd = document.getElementsByTagName("td");

			for (var i = 0; i < rtd.length; i++) {
				rtd[i].style.backgroundColor = "olive";
			}
		}
 */
	 </script>