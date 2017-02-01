<html>
	<head>
	<meta http-equiv="Content-Type" content="texthtml; charset=utf-8" />
		<style>
			td {background-color:whitesmoke; border:1px solid blue;}
		</style>
	</head>
<body>

<?php
	//print_r($_POST);

	include_once 'header.php';


	if (isset($_POST[auto]) or isset($_POST[zapcasti])) {
        include_once 'algoritm.php';
		include_once 'result.php';

		if (isset($_POST[auto])) {
           include_once  'mass_auto.php';
		}
		else if (isset($_POST[zapcasti])) {
           include_once  'mass_zapcasti.php';
		}
	}


	function func_sort ($a, $b) {
		if ($a[2] > $b[2]) return 1;
		else if ($a[2] < $b[2]) return -1;
		else return 0;
	}

	usort($price, 'func_sort');

	include_once 'result.php'; 

?>

</body>
</html>
