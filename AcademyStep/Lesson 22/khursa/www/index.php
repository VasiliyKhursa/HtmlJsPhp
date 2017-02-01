<html>
<head>

<style>

</style>
</head>
<body>

<?php
	//echo 'Hello';

	$a = 2;
	$b = 3;
	$col = 'blue';

	//echo '<a href ="#" id="link" onclick="link.style.backgroundColor=\'gold\'">Link</a> <br>';

	echo '<a href ="#" id="link" onclick="func2();">Link</a> <br>';

	echo '<script>';
	echo '
	function func() {
    	link.style.backgroundColor="gold";
	}';

	echo "
	function func2() {
		// переедали цвет как переменную. Обрати внимание на кавычки в '$col'
    	link.style.backgroundColor='$col';
	}";




	echo '</script>';

	echo "Сумма $a и $b равна <br>";

	echo "<b>".($a+$b)."</b>";
?>

<script>
	// php встраививаеться в JS
	// передача параметров из php в JS
	var cislo = 5 + <?php echo  $a + $b; ?>;
	var fon = '<?php echo $col;?>';


	function func2() {
		console.log(cislo);
        link.style.backgroundColor =  fon;
	}
</script>

<script>

	// переедаача на серверпраметров
	var w = screen.width;

	var h = screen.height;

   //	location.href = "test.php?width=" + w + "&height=" + h;


</script>

<?php
	$mas1 = array (4, "buc"=>8);			// перввый элемент массива 4, элемент с индексом 2 равен 8. Масссив [4, , 8]
	//$mas1[1] = 4; 						// Масссив [4, 4, 8]

/*
	// обычный массив
	for ($i=0; $i<count($mas1); $i++){
		echo "<br> $i - $mas1[$i]";
	}
*/
	// массив foreach
	foreach($mas1 as $k1 => $mas11) {
		echo "<br> $k1 - $mas11";
	}

?>


</body>
</html>
