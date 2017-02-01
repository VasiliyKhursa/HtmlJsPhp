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
	include_once 'form.php';

	if(isset($_POST['auto']) or isset($_POST['zapcasti'])) {
		include_once 'algoritm.php';
	}
	else {
	    include_once 'hello.php';
	}
?>

</body>
</html>
