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
	echo "<br>";
    $mas3 = array ("Вторник","Четвеерг","Среда","Понидельник");
	$mas4 = array (array ("Вторник","Четвеерг", "Среда","Понидельник"), array("Январь","Февраль", "Март"));

	//in_array("Среда",$mas3) -  дает истину или ложь
	if (in_array("Среда",$mas3)) {
     //	$mas3[array_search("Среда",$mas3)] = "<span style='color:green';>".$mas3[array_search("Среда",$mas3)]."</span>";

	 // Занятие3
		$mass = "<span style='color:green';>".$mas3[array_search("Среда",$mas3)]."</span>";
		$mas3[array_search("Среда",$mas3)] = "Четверг";
		$mas3[] = $mass;

	}
    print_r($mas3);

	echo "<br>";
	foreach ($mas4 as $ks => $mas41) {
       	if (in_array("Март",$mas41)) {
       		//$mas4[$ks][array_search("Март",$mas41)] = "<span style='color:green';>".$mas4[$ks][array_search("Март",$mas41)]."</span>";
            $mass = "<span style='color:green';>".$mas4[$ks][array_search("Март",$mas41)]."</span>";
			$mas4[$ks][array_search("Март",$mas41)] = "Апрель";
			$mas4[$ks][] = $mass;
			//$mas4[][] = $mass;
		}
	}
	print_r($mas4);


	// Занятие 3
	echo "<br>";
	echo "Занятие 3";
	echo "<br>";
    $mas3 = array ("Вторник","Четвеерг","Среда","Понидельник");
	$mas4 = array (array ("Вторник","Четвеерг", "Среда","Понидельник"), array("Январь","Февраль", "Март"));

	if (in_array("Среда",$mas3)) {
		unset ($mas3[array_search("Среда",$mas3)]);
		$mas3 = array_values($mas3);
	}

	print_r($mas3);

	echo "<br>";
	foreach ($mas4 as $ks => $mas41) {
       	if (in_array("Среда",$mas41)) {
			//unset ($mas4[$ks][array_search("Среда",$mas41)]);
            //$mas4[$ks] = array_values($mas4[$ks]);

			unset ($mas4[$ks]); 			// удалени
			$mas4 = array_values($mas4);												// переиндексация массива(изменение индексов)
		}
	}

	print_r($mas4);



   	echo "<br>";
	$mas3 = array ("Вторник","Четвеерг","Среда","Понидельник");
	$mas4 = array (array ("Вторник","Четвеерг", "Среда","Понидельник"), array("Январь","Февраль", "Март"));
	if (in_array("Среда",$mas3)) {
		//unset ($mas3[array_search("Среда",$mas3)]);
        array_splice($mas3,array_search('Среда',$mas3),0,"Четверг");

	}
	print_r($mas3);

   	echo "<br>";
 	foreach ($mas4 as $ks => $mas41) {
       	if (in_array("Март",$mas41)) {
		   //	array_splice($mas4[$ks],array_search('Март',$mas41),0,"Ноябрь");    			// array_splice (куда, на какое место, сколько удалить, что вставить)
           array_splice($mas4,$ks,0,array($mas3));    			// array_splice (куда, на какое место, сколько удалить, что вставить)
		   array_splice($mas4,0,0,array($mas3));    			// array_splice (куда, на какое место, сколько удалить, что вставить)
		}
	}

		print_r($mas4);

   	echo "<br>";
	$mas3 = array ("Вторник","Четвеерг","Среда","Понидельник");

	foreach ($mas3 as $k1 => $elem) {
		$mas3["a".$k1] = $elem;
		unset($mas3[$k1]);
	}

	print_r($mas3);

	round($a);
	mt_rand(1,1000);

	$alf='A B C D E F G H I J K L M N O P Q R S T U V W X Y Z';
	$massivAr = explode(" ",$alf);

	$pass1 = mt_rand(10,99);
	$pass21 = $massivAr[mt_rand(0, count($massivAr))];
	$pass22 = $massivAr[mt_rand(0, count($massivAr))];
	$pass3 = mt_rand(10,99);
	$pass41 = $massivAr[mt_rand(0, count($massivAr))];
	$pass42 = $massivAr[mt_rand(0, count($massivAr))];

	$pass = $pass1.$pass21.$pass22.$pass3.$pass41.$pass42;


	echo "<br>";
	echo "$pass";
	echo "<br>";
	print_r($massivAr);

	echo "<br>";
	echo "<br>";

	$mas5 = array (4,'c',8);
	echo min($mas5);
	echo "<br>";


	$mas6 = array (array (1, 2, 8), array("f","b", "c"));

    foreach ($mas6 as $k1 => $mas61) {
        echo $k1.' - '.min($mas61)."<br>";
		//echo $k1.' - '.$mas61."<br>";
    }

	//echo min($mas6);
	echo "<br>";



	echo date('d-m-Y')."<br>".date('d.m.Y')."<br>".date('Y.m')."<br>".date('Y-01-01')."<br>";

    echo "time - ".date('d-m-Y', time() + 60*60*24*3)."<br>";


	echo date('d-m-Y', strtotime("+1 months"))."<br>";
	echo date('d-m-Y', strtotime("-1 year"))."<br>";

	echo date('01-01-Y', strtotime("-1 year"))."<br>";

	echo date('d-m-Y', strtotime("-7 day"))."<br>";

	echo date('d-m-Y', strtotime("-1 week"))."<br>";


    $a = 3;

	if (isset($a) and !empty($a)) {
		echo $a*3;
		echo "<br>";
	}

	if (gettype($a) == 'integer') {
       echo $a;
	   echo "<br>";
	}

	if (gettype($a) != 'integer') {
       settype($a, 'string');
	   echo $a;
	   echo "<br>";
	}

	is_integer($a);				// проверем на интеджер

	$b = '5a';
	$b = intval($b);
	echo $b;
	echo "<br>";




	// УРОК25
	echo "<br>";
	echo "_SERVER.<br>";
	print_r ($_SERVER);
	echo "<br>";

	echo "<br>";
	echo "GLOBALS.<br>";
	print_r ($GLOBALS);
	echo "<br>";

	echo "<br>";
	echo "_REQUEST.<br>";
	print_r ($_REQUEST);
	echo "<br>";

	echo "<br>";
	echo "_REQUEST.<br>";
	print_r ($_REQUEST);
	echo "<br>";	

?>

<?php



?>


</body>
</html>
