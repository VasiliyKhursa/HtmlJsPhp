<?php
session_start();
define ('php', true);     // установить
?>
<html>
<head>
<meta http-equiv="Content-Type" content="texthtml; charset=utf-8" />
<script type="text/javascript" src="ajax_post_get_jq.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<style>
 td {background-color:whitesmoke; border:1px solid blue;}
</style>
</head>
<body onload="jquery_send('#frm', 'post', 'forma.php', ['php'],[true]);">



<?php

//include_once 'forma.php';
echo '<div id="frm"></div>';

include_once 'shapka.php';  

include_once 'function.php';        

//tableDOM();                         //$$$

?>

</body>
</html>
