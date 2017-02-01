<?php
	// функция вывода массива
	function print_table($masIn) {
		$string = "<table border='1' width='600'
			<thead>
				<tr>
					<td>Марка</td><td>Модель</td><td>Цена</td>
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
?>