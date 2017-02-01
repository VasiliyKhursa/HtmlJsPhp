<?php

	error_reporting(E_ERROR);					//убераем сообщени о предупрждении
//	setcookie('php', 'php1', mktime(0,0,0,1,1,2017));
///	setcookie('php', 'php1'.$_COOKIE['php'], mktime(0,0,0,1,1,2017));
///	echo "setcookie.<br>";
///	echo $_COOKIE['php']."<br>";


?>

<html>

<head>
	<title>Untitled</title>
</head>

<body>
	<form name="" method="post" action="upload.php" enctype="multipart/form-data">
    	<input type="file" name="userFile[]" multiple="true">
		<input type="submit" value="go">
		<input type="hidden" name="MAX_FILE_SIZE" value="100000">

	</form>

	<iframe name="ifr" style="width: 300px; height: 200px"></iframe>
</body>

</html>