<html>
<head>
<title>����� PHP</title>
</head>
<body>

<?php
    //�������� �������. ���� �2-1: PHP � ������, �������
    $string = 'ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';
    echo "String = ".$string;
    $table = "<table width='400' border='1' bordercolor='#000000' >
                <tr>
                    <td style='text-align:center'>�����</td>
                    <td style='text-align:center'>������</td>
                    <td style='text-align:center'>����</td>
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
    //�������� �������. ���� �2-2: PHP � ������� (�����������).


    //------------------------------------------------------------------------//
    //�������� �������. ���� �3_1: PHP � ������� (�����������).
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
                    <td style='text-align:center'>�����</td>
                    <td style='text-align:center'>������</td>
                    <td style='text-align:center'>����</td>
                </tr>";

    //������� ����������� �������
    foreach($new_mas as $m1 => $mm1){

        $table = $table."<tr>";

        if ( in_array($search, $mm1) ){
            $key_stroka = $m1;  //���� ����� � ���� if �� ���������� $key_stroka ����������� ����� �������, � ������� ��� �����
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
