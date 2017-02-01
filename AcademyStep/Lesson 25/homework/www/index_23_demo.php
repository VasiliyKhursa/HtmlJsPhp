<html>
<head>
<title>Проба PHP</title>
</head>
<body>

<?php
    //Домашнее задание. Урок №2-1: PHP – строки, массивы
    $string = 'ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';
    echo "String = ".$string;
    $table = "<table width='400' border='1' bordercolor='#000000' >
                <tr>
                    <td style='text-align:center'>Марка</td>
                    <td style='text-align:center'>Модель</td>
                    <td style='text-align:center'>Цена</td>
                </tr>";
    //echo $table;
    $massiv1 = explode("||",$string);
    //print_r($massiv1);
    foreach($massiv1 as $val1){
        $table = $table."<tr>";
        $massiv2 = explode("|",$val1);

        foreach($massiv2 as $val2){
            $table = $table."<td>".$val2."</td>";
        }

    }
    $table = $table."</tr>";
    $table = $table."</table>";

    echo $table;


    //------------------------------------------------------------------------//
    //Домашнее задание. Урок №2-2: PHP – массивы (продолжение).


    //------------------------------------------------------------------------//
    //Домашнее задание. Урок №3_1: PHP – массивы (продолжение).
    $search = 'LENOVO';
    $string = 'ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';
    echo "String = ".$string;
    $massiv1 = explode("||",$string);

    foreach($massiv1 as $k1 => $val1){
        $massiv2 = explode("|",$val1);
        foreach($massiv2 as $k2 => $val2){
            $new_mas[$k1][$k2] = $val2;
        }

    }
    echo "<br>";
    print_r($new_mas);

    $table = "<table width='400' border='1' bordercolor='#000000' >
                <tr>
                    <td style='text-align:center'>Марка</td>
                    <td style='text-align:center'>Модель</td>
                    <td style='text-align:center'>Цена</td>
                </tr>";

    //перебор двухмерного массива
    foreach($new_mas as $m1 => $mm1){

        $table = $table."<tr>";

        if ( in_array($search, $mm1) ){
            $key_stroka = $m1;  //если зашли в этот if то переменной $key_stroka присваиваем номер массива, в котором его нашли
            $key_stolbec = array_search($search, $mm1);

        }
		else {
            $key_stroka = -1;
            $key_stolbec = -1;
		}

        foreach($mm1 as $m2 => $mm2){
            if ($key_stroka == $m1 and $key_stolbec == $m2) {$table = $table."<td> <a href = '#'>".$mm2."</a></td>";} else
            {$table = $table."<td>".$mm2."</td>";}
        }

		$table = $table."</tr>";
    }

    $table = $table."</table>";

    echo $table."<br>";
    echo  $key_stroka."<br>";
    echo $key_stolbec."<br>";











?>

</body>
</html>
