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


	// обычный массив
	for ($i=0; $i<count($mas1); $i++){
		//echo "<br> $i - $mas1[$i]";
        $mas1[$i]++;

	}

    //print_r($mas1);
    echo '<br>';


    $mas1 = array (4, 2=>8);			// перввый элемент массива 4, элемент с индексом 2 равен 8. Масссив [4, , 8]
	$mas1[1] = 4;
	// массив foreach
	foreach($mas1 as $k1 => $mas11) {
		//echo "<br> $k1 - $mas11";
        $mas1[$k1]++;

	}
    //print_r($mas1);
    echo '<br>';
/*
    $mas2 = array(array(4,2,8), array(b,a,c));
    for ($i=0; $i<count($mas2); $i++){
        for ($j=0; $j<count($mas2[$i]); $j++){
          echo "$i- $j - ".$mas2[$i][$j]."<br>";
          }
    }

    foreach($mas2 as $k1 => $mas21){
        foreach($mas21 as $k2 => $mas22) {
          if ($k1 == 0){
            $mas[$k1][$k2]++;
          }
         //echo "$k1- $k2 :".$mas22."<br>";
    }
    }
    print_r($mas2);
 */
    $mas1 = array(4,2,8);

    $mas2 = array(array(4,2,8), array(b,a,c));
    foreach($mas2 as $k1 => $mas21)
    echo count($mas21);

    for ($i=0; $i<count($mas2); $i++){
        for ($j=0; $j<count($mas2[$i]); $j++){
          echo "$i- $j - ".$mas2[$i][$j]."<br>";
          }
    }

    echo key($mas1).'-'.current($mas1)."<br>";
    next($mas1);
    echo key($mas1).'-'.current($mas1)."<br>";
    reset($mas1);//сбросить укахатель в начало
    echo key($mas1).'-'.current($mas1)."<br>";


    $mas2 = array(array(4,2,8), array(b,a,c));
    echo key($mas2).'-'.current($mas2)."<br>";
        foreach($mas2 as $k1 => $mas21)
        echo key($mas21).'-'.current($mas21)."<br>";
    next($mas2);
    echo key($mas2).'-'.current($mas2)."<br>";


    $mas1 = array(4, "a" => 2,8);
    $mas2 = array(array(4,2,8), array(b,a,c));
    //------------
    asort($mas1);
    print_r($mas1);
    echo "<br>";
    //-------------
    foreach($mas2 as $k1 => $mas21)
    asort($mas2[$k1]);
    print_r($mas2);
    echo "<br>";

    $d = array ("вторник", "среда", "понедельник");
    usort($d, "func");  //user sort
    function func($a1, $a2){
      $ds = array(1 => "понедельник", 2=>"вторник", 3=>"среда");
      foreach($ds as $ks => $dss)
      if ($dss == $a1) $k1 = $ks;
      if ($dss == $a2) {$k2 = $ks;
      if ($k1 > $k2) return 1;
      else if ($k1 == $k2) return 0;
      else return -1;
    }
    }
    print_r($d);
    echo "<br>";

    $mas3 = array("вторник", "среда", "понедельник");
    $mas4 = array(array("вторник", "среда", "понедельник"), array("февряль", "март", "январь"));
    foreach($mas3 as $ks => $mas31) {
        if ($mas3[$ks] == "среда"){
            $mas3[$ks] = "<span style = 'color:red'>$mas31</span>";
        }

    }
    print_r($mas3);
    echo "<br>";
    echo "<br>";

     foreach($mas4 as $k1 => $mas41) {
        foreach($mas41 as $k2 => $mas42) {
            if ($mas42 == "март"){
            $mas4[$k1][$k2] = "<span style = 'color:red'>$mas42</span>";
        }

        }
     }
     print_r($mas4);


    $mas3 = array("вторник", "среда", "понедельник");
    $mas4 = array(array("вторник", "среда", "понедельник"), array("февряль", "март", "январь"));
    if (in_array( 'среда', $mas3)){
      $mas3[array_search('среда', $mas3)] = '<b>'.$mas3[array_search('среда', $mas3)].'</b>';
    }
    echo "<br>";  
    print_r($mas3);


?>


</body>
</html>
