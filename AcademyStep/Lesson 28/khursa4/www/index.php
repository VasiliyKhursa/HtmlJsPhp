<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="ajax_post_get_jq.js "></script>
</head>
<body>
<form name="form1">
<input type="text" name="param1" value="5"><br>
<input type="text" name="param2" value="3"><br>
<input type="button" value="Сложить" onclick="post_send('summa','sum.php',['param1','param2'],[param1.value,param2.value])">

</form>
<b><span id="summa"></span></b>

<script>

</script>
</body>
</html>
