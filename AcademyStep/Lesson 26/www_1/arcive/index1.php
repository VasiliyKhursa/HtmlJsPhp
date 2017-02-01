<?php
	include_once 'header.php'

	$a = 'LENOVO';
	$b = 'A1000';
	$c = '2000'

    $massiv[0][0] = $a;
    $massiv[0][1] = $b;
    $massiv[0][1] = $c;

	include_once 'result.php'

	print_table($massiv);
?>