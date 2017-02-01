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
	$mas1 = array (4, 2=>8);			// перввый элемент массива 4, элемент с индексом 2 равен 8. Масссив [4, , 8]
	$mas1[1] = 4; 						// Масссив [4, 4, 8]


	echo "<br>";
	// обычный массив
	for ($i=0; $i<count($mas1); $i++){
		//echo "<br> $i - $mas1[$i]";
        $mas1[$i]++;
	}
 		print_r($mas1);
 		echo "<br>";

	$mas1 = array (4, 2=>8);			// перввый элемент массива 4, элемент с индексом 2 равен 8. Масссив [4, , 8]
	$mas1[1] = 4; 						// Масссив [4, 4, 8]

    echo "<br>";
	// массив foreach
	foreach($mas1 as $k1 => $mas11) {

		$mas1[$k1]++;
        //$mas11++;
		//echo "<br> $k1 - $mas11";
	}
    print_r($mas1);
	echo "<br>";
	echo "<br>";




	$mas2 = array (array(4,2,6),array(b, a, c), array(1, 2, 3));

	for ($i = 0; $i < count($mas2); $i++) {
    	for ($j = 0; $j < count($mas2[$i]); $j++) {
     		echo "$i - $j : ".$mas2[$i][$j]."<br>";
		}
	}

	echo "<br>";
	echo "<br>";
	$mas2 = array (array(4,2,8),"buc"=>array(b, a, c), array(1, 2, 3));

	foreach ($mas2 as $k1 =>$mas21) {
		foreach ($mas21 as $k2 =>$mas22) {

		echo "$k1 - $k2 : $mas22 <br>";

		if ($k1 == 0) {
            $mas2[$k1][$k2]++;
		}

		}
	}

	print_r($mas2);



	echo "<br>";
	echo "<br>";
	$mas2 = array (array(4, 2, 8), array(b, a, c), array(1, 2, 3));
	$mas1 = array (4, 2, 8);

	foreach ($mas2 as $k1 => $mas21 ){
		echo "$k1 - ".count($mas21)."<br>";

	}

    echo "<br>";

	echo key($mas1).' - '.current($mas1)."<br>";
	next($mas1);
    echo key($mas1).' - '.current($mas1)."<br>";
	reset($mas1);
	echo key($mas1).' - '.current($mas1)."<br>";



	$mas2 = array (array(4, 2, 8), array(b, a, c), array(1, 2, 3));
    echo key($mas2).' - '.current($mas2)."<br>";
	next($mas2);
    echo key($mas2).' - '.current($mas2)."<br>";


	foreach ($mas2 as $k1 => $mas21 ){
		next($mas21);
		echo "$k1 - ".key($mas21).' - '.current($mas21)."<br>";

	}

	$mas1 = array (4, 2, 8);

	// обычная сортировка без сохранения ассоциации "ключ - значениеы"
	sort($mas1);			//sort($mas1, SORT_STRING); sort($mas1, SORT_NUMBER);
	print_r($mas1);

	$mas1 = array (4, 2, 8);
	asort($mas1);
	print_r($mas1);

	$mas1 = array (4, "a" =>2, 8);
	asort($mas1); 		// делает асоциативнуюсортировку (ключ-значение) по значению
	print_r($mas1);

	echo "<br>";
	// сортировка внешнего массива двумерного массиваа
	$mas2 = array (array(4, 2, 8), array(b, a, c), array(1, 2, 3));
	asort($mas2);
	print_r($mas2);


    echo "<br>";
	// сортировка внутри двумерного массива каждого подмассива
	$mas2 = array (array(4, 2, 8), array(b, a, c), array(1, 2, 3));
	foreach ($mas2 as $k1 => $mas21) {
        asort($mas2[$k1]);
	}
	print_r($mas2);

    echo "<br>";
	// сортировк по алфавиту )
    $mas2 = array ("Вторник","Четвеерг", "Среда","Понидельник");
	asort($mas2);
	print_r($mas2);

   echo "<br>";
	// Пользовательская сортиовка )
	$mas2 = array ("Вторник","Четвеерг", "Среда","Понидельник");


	usort($mas2, "my_sort");

    function my_sort($a1, $a2) {
        $ds = array("Понидельник", "Вторник", "Среда", "Четвеерг", "Пятница", "Суббота", "Воскресенье");
	    foreach ($ds as $ks =>$dss) {
	    	if ($dss == $a1)
	        	$k1 = $ks;
			if ($dss == $a2)
	           $k2 = $ks;
	    }

		if ($k1 > $k2)
	       return 1;
		if ($k1 < $k2)
	       return  -1;
		if ($k1 == $k2)
	       return  0;
	}

	print_r($mas2);

    $mas3 = array ("Вторник","Четвеерг","Среда","Понидельник");
	$mas4 = array (array ("Вторник","Четвеерг", "Среда","Понидельник"), array("Январь","Февраль", "Март"));

	foreach ($mas3 as $k1 => $mas31) {
		if ($mas31 == "Среда") {
            $mas3[$k1] = "<span style='color:blue';>$mas31</span>";
		}
	}
    echo "<br>";
	print_r($mas3);

	foreach ($mas4 as $k1 => $mas41) {
		foreach ($mas41 as $k2 => $mas42) {
			if ($mas42 == "Март") {
            	$mas4[$k1][$k2] = "<span style='color:green';>$mas42</span>";
			}
		}
	}

	echo "<br>";
	print_r($mas4);


	//  теперь обойдемся безперебора
	echo "<br>";
    $mas3 = array ("Вторник","Четвеерг","Среда","Понидельник");
	$mas4 = array (array ("Вторник","Четвеерг", "Среда","Понидельник"), array("Январь","Февраль", "Март"));

	//in_array("Среда",$mas3) -  дает истину или ложь
	if (in_array("Среда",$mas3)) {
    	$mas3[array_search("Среда",$mas3)] = "<span style='color:green';>".$mas3[array_search("Среда",$mas3)]."</span>";
	}
    print_r($mas3);

	echo "<br>";
	foreach ($mas4 as $ks => $mas41) {
       	if (in_array("Март",$mas41)) {
       		$mas4[$ks][array_search("Март",$mas41)] = "<span style='color:green';>".$mas4[$ks][array_search("Март",$mas41)]."</span>";

		}
	}
	print_r($mas4);
?>

<?php



?>


</body>
</html>
