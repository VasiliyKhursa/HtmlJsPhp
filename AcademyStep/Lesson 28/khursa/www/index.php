<!DOCTYPE HTML>

<html>

<head>
	<title>Untitled</title>
</head>

<body>
	<form name="form1">                         				<!--method="POST"  action="sum.php"-->
    	<input type="text" name="param1" value="1">
        <input type="text" name="param2" value="2">
		<input type="button" value="submit" onclick="post_send(form1.param1.value, form1.param2.value)">       	<!-- submit приведет к перезагрузке   -->

	</form>

    <span id="sum"> </span>

     <script>
	     var req;

	     function post_send(value1, value2) {

             req = new  XMLHttpRequest();													// создаем объект
			 req.open('POST', 'sum.php', true);												// запускаем AJAX, true - асинхронный
			 req.onreadystatechange = func_response;										// функция обработчик приема данных
			 req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');		// необходимо только для POST
			 var str = 'param1=' + value1 + '&param2=' + value2;   							// составлем URL строку
			 req.send(str);																	// отправляем?

	     }

         function func_response() {
             if (req.readyState == 4 && req.status == 200) {     // 200 - сервер отдал, 4 - сервер был готов
                sum.innerHTML = req.responseText;
             }
         }


	 </script>


	<?php
       /*
		if (isset($_POST['param1']) and isset($_POST['param2'])) {
			$x = $_POST['param1'];
			$y = $_POST['param2'];
			$z = $x + $y;
			echo '<script>
	        sum.innerHTML = '.$z.'
			</script>';
		}
		*/
	?>

</body>

</html>