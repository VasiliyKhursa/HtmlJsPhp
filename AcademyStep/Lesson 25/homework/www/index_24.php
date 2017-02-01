<?php

// входящая строка
$str='ACER|ES1|5300||LENOVO|G50|5500||HP|G3|5100';
echo $str."<br/>";



	// генерация двумерного массива из строки
	echo "создание таблици";
	$massiv1 = explode("||",$str);
	foreach ($massiv1 as $k1 => $val1) {
	    $massiv2 = explode("|",$val1);
	    foreach ($massiv2 as $k2 => $val2) {
			$massiv[$k1][$k2] = $val2;
		}
		$massiv[$k1][] = "Вид" ;
		$massiv[$k1][] = "Дата" ;
	}


    // функция вывода массива
	function print_table($masIn) {
		$string = "<table border='1' width='600'
			<thead>
				<tr>
					<td>Марка</td><td>Модель</td><td>Цена</td><td>Вид</td><td>Дата</td>
				</tr>
			</thead>";
			// сортировка массива
		foreach ($masIn as $val1) {
			$string = $string."<tr>";

		    foreach ($val1 as $val2) {
				$string = $string."<td>";
				$string = $string."$val2";
				$string = $string."</td>";
			}

			$string = $string."</tr>";
		}

		$string = $string."</table>";

		echo "$string";
	}

    // вывод сгенерированного массива
	//print_r($massiv);
	print_table($massiv);


	// сортировка "по возрастанию"
	    function mycort($a1, $a2) {
    	if ($a1[2] > $a2[2]) return 1;
		else if ($a1[2] < $a2[2]) return -1;
		else return 0;
    }


	echo "сортировка 'по возрастанию'";
	usort( $massiv , "mycort");
	// вывод отсортированного массива
	print_table($massiv);
	//print_r($massiv);


	// сортировка "по убыванию"
	echo "сортировка 'по убыванию'";
    function mycort_r($a1, $a2) {
    	if ($a1[2] > $a2[2]) return -1;
		else if ($a1[2] < $a2[2]) return 1;
		else return 0;
    }

	$massivSave =$massiv;

	// вывод отсортированного массива
	usort( $massiv , "mycort_r");
	print_table($massiv);
	//print_r($massiv);


	// Задание часть 2
    echo "Поиск определенного телефона";
	$sear='LENOVO';

	foreach ($massiv as $k1 => $mas1)
	if(in_array('LENOVO', $mas1)) {
		$k2 = array_search('LENOVO', $mas1);
		//echo $k2;
    	//echo "<br>"."true - ".$k1;
        $massiv[$k1][$k2] = "<a href='#'>".$massiv[$k1][$k2]."</a>";

		foreach ($mas1 as $k3 => $val) {
			if ($k3 != $k2)
               $massiv[$k1][$k3] = "<span style='color:red';>".$massiv[$k1][$k3]."</span>";
		}
	}
	else {
    	//echo "<br>"."false - ".$k1;
	}
	print_table($massiv);

	$massiv = $massivSave;

	// сортировка "по возрастанию"
	echo "сортировка 'по возрастанию'";
	usort( $massiv , "mycort");
	// вывод отсортированного массива
	print_table($massiv);


    // Задание Урок 24 - перемещение строки
	// удаление строки
	echo "удаление строки и перемещение вверх";
    foreach ($massiv as $k1 => $mas1)
		if (in_array('LENOVO', $mas1)) {
            unset ($massiv[$k1]); 								// удаление
			array_splice($massiv,0,0,array($mas1));    			// array_splice (куда, на какое место, сколько удалить, что вставить)
       }
	// вывод после удаление
    print_table($massiv);

 /*
	foreach ($massiv as $k1 => $mas1)  {
        $massiv[$k1][] = "Вид" ;
		$massiv[$k1][] = "Дата" ;
	}

	// Добавление столбиков
    print_table($massiv);
 */

/*
 if(isset($_FILES['userFile'])) {
   $dir = '/home/test.ua/www/';
   for($i=0; $i<count($_FILES['userfile']['tmp_name']); $i++) {
     if(strpos($_FILES['userfile']['name'][$i], 'jpg')!==false or strpos($_FILES['userfile']['name'][$i], 'gif')!==false or strpos($_FILES['userfile']['name'][$i], 'png')!==false) {
         if (copy($_FILES['userfile']['tmp_name'][$i], $dir.$_FILES['userfile']['name'][$i])) {
             echo 'Файл '.($i+1).' переместили успешно!<br>';
         }
         else {echo 'Ошибка перемещения файла '.($i+1).'!<br>';}
     }
   }
}
*/
	if(isset($_FILES['userFile'])) {
		print_r($_FILES);
		echo "<br><br>";
	}

	if (isset($_FILES['userFile'])) {
	// проверем файл на создание
    print_r($_FILES['userFile']);
	echo "<br>";

	$dir = '/home/homework/www/';

        for ($i = 0; $i < count($_FILES['userFile']['tmp_name']); $i++) {

        	if(    (strpos($_FILES['userFile']['name'][$i],'.jpg') !== false)
				or (strpos($_FILES['userFile']['name'][$i],'.gif') !== false)
				or (strpos($_FILES['userFile']['name'][$i],'.png') !== false)
				or (strpos($_FILES['userFile']['name'][$i],'.jpeg') !== false) ){

				if (copy($_FILES['userFile']['tmp_name'][$i], $dir.$_FILES['userFile']['name'][$i])) {
					$name_archive = $_FILES['userFile']['name'][$i];
					$name_file = strtoupper($_FILES['userFile']['name'][$i]);

                     foreach ($massiv as $k1 => $mas1)
					 	if (strpos($name_file,$mas1[0]) !== false) {
					 		// вводим название файла в столбец ВИД, но только большими буквами
                            //$massiv[$k1][3] = $name_file;

							// вводим название файла в столбец ВИД, как в массиве $_FILES
							//$massiv[$k1][3] = $_FILES['userFile']['name'][$i];

                            // вводим название файла в столбец ВИД, как в массиве $_FILES
							$massiv[$k1][3] = "<img src='".$_FILES['userFile']['name'][$i]."'/>";
					 	}
                        /*
						if (in_array('LENOVO', $mas1)) {
				            unset ($massiv[$k1]); 								// удаление
							array_splice($massiv,0,0,array($mas1));    			// array_splice (куда, на какое место, сколько удалить, что вставить)
				       }
					   */

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

	// вывод массива
	print_table($massiv);
?>