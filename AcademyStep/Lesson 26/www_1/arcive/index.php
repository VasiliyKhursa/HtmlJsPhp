<html>

<head>
	<title>Untitled</title>
	<style>
    td{
      border: 1 px solid blue;
	  background-color: #C60ECC;
    }

	</style>
</head>

<body>
	<?php
	include_once 'header.php';


	$a = 'LENOVO';
	$b = 'A1000';
	$c = '2000';

    $massiv = array (array ('LENOVO', 'A1000', '2000'),array ('LENOVO', 'A1000', '2000')) ;


	include_once 'result.php';

	print_table($massiv);
?>
</body>

</html>