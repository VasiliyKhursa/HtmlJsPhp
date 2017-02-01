<div id="forma">
<form>
<input type="button" value="Автомобили" name="auto" onclick='post_send("tbod","algoritm.php",[this.name],[]);'>
<input type="button" value="Запчасти" name="zapcasti" onclick='post_send("tbod","algoritm.php",[this.name],[]);'>
<input type="button" value="Запчасти" name="zapcasti" onclick='post_send_1(this.name);'>
</form>
</div>

<div id="shapka">
<table>
	<tbody>
		<tr>
			<td style="background-color:silver; font-weight:bold; border:1px solid blue;">МАРКА</td>
			<td style="background-color:silver; font-weight:bold; border:1px solid blue;">МОДЕЛЬ</td>
			<td style="background-color:silver; font-weight:bold; border:1px solid blue;">ЦЕНА</td>
		</tr>
	</tbody>

	<tbody id="tbod">
	</tbody>
</table>
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

		var mass_img=new Array("lenovo.jpg", "acer.jpg", "hp.jpg");
		var i=0;
	    clearInterval(int);
		var int = setInterval("func_img()", 1500);
		function func_img() {
		i++;
		if(i==mass_img.length) {i=0;}
		var sl=document.getElementById("slider");
		sl.innerHTML="<img src="+mass_img[i]+">";
		}



 	</script>