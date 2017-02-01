<?php

$str='ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';

echo $str;
echo "<br/>";

$massiv1 = explode("||",$str);

$string = "<table border='1' width='600'
	<thead>
		<tr>
			<td>Марка</td><td>Модель</td><td>Цена</td>
		</tr>
	</thead>";

foreach ($massiv1 as $val1) {
	$string = $string."<tr>";

    $massiv2 = explode("|",$val1);
    foreach ($massiv2 as $val2) {
		$string = $string."<td>";
		$string = $string."$val2";
		$string = $string."</td>";
	}

	$string = $string."</tr>";
}

$string = $string."</table>";

echo "$string";

?>