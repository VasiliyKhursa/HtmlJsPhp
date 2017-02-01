<?php
	setcookie('yes', 'php', mktime(0,0,0,1,1,2017));
	$a = 'Lenovo';
    $b = 'A1000';
    $c = '2000';
?>

<html>
<head>

<style>
td{
	border:1 px solid blue;
	background-color: whitesmoke;
}

</style>
</head>
<body>

<?php

	if (isset($_COOKIE['yes'])) {
	    include_once 'header.php';
	    include_once 'result.php';
	}
	else {
	    include_once 'header1.php';
	    include_once 'result1.php';
	}





?>


</body>
</html>
