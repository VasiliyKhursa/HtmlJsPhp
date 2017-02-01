<html>
<head>
<style>

</style>
</head>
<body>

<form method="post" action="index0.php" enctype="multipart/form-data" target="ifr">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="userfile[]" multiple="true">
<input type="submit" value="Записать">
</form>

<iframe src="index0.php" name="ifr" width="700" height="700" frameborder="0"></iframe>

</body>
</html>
