<?php
	error_reporting(E_ERROR);					// убераем сообщени о предупрждении
    print_r($_FILES);							// показывваем инфу про файл

/*
	if (isset($_FILES['userFile'])) {
		// проверем файл на создание
        print_r($_FILES['userFile']);
		echo "<br>";

		$dir = '/home/khursa/www/';

		if (copy($_FILES['userFile']['tmp_name'], $dir.$_FILES['userFile']['name'])) {
             echo "ok<br>";
		}
		else {
             echo "error<br>";
		}
	}
*/

	if (isset($_FILES['userFile'])) {
		// проверем файл на создание
        print_r($_FILES['userFile']);
		echo "<br>";

		$dir = '/home/khursa/www/';

        for ($i = 0; $i < count($_FILES['userFile']['tmp_name']); $i++) {

        	if(    (strpos($_FILES['userFile']['name'][$i],'.jpg') !== false)
				or (strpos($_FILES['userFile']['name'][$i],'.gif') !== false)
				or (strpos($_FILES['userFile']['name'][$i],'.png') !== false)
				or (strpos($_FILES['userFile']['name'][$i],'.jpeg') !== false) ){

				if (copy($_FILES['userFile']['tmp_name'][$i], $dir.$_FILES['userFile']['name'][$i])) {
		             echo "ok<br>";
				}
				else {
		             echo "error<br>";
				}
        	}
			else{
               echo "error format file <br>";
			}


		}
	}

?>