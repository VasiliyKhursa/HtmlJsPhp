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
		// ��������� ���� ��� ����������. ������ �������� �� ������� � '$col'
    	link.style.backgroundColor='$col';
	}";




	echo '</script>';

	echo "����� $a � $b ����� <br>";

	echo "<b>".($a+$b)."</b>";
?>

<script>
	// php ��������������� � JS
	// �������� ���������� �� php � JS
	var cislo = 5 + <?php echo  $a + $b; ?>;
	var fon = '<?php echo $col;?>';


	function func2() {
		console.log(cislo);
        link.style.backgroundColor =  fon;
	}
</script>

<script>

	// ���������� �� ���������������
	var w = screen.width;

	var h = screen.height;

   //	location.href = "test.php?width=" + w + "&height=" + h;


</script>

<?php
	$mas1 = array (4, "buc"=>8);			// ������� ������� ������� 4, ������� � �������� 2 ����� 8. ������� [4, , 8]
	//$mas1[1] = 4; 						// ������� [4, 4, 8]

/*
	// ������� ������
	for ($i=0; $i<count($mas1); $i++){
		echo "<br> $i - $mas1[$i]";
	}
*/
	// ������ foreach
	foreach($mas1 as $k1 => $mas11) {
		echo "<br> $k1 - $mas11";
	}

?>


</body>
</html>
