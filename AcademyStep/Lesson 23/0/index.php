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
	$mas1 = array (4, 2=>8);			// ������� ������� ������� 4, ������� � �������� 2 ����� 8. ������� [4, , 8]
	$mas1[1] = 4; 						// ������� [4, 4, 8]


	// ������� ������
	for ($i=0; $i<count($mas1); $i++){
		//echo "<br> $i - $mas1[$i]";
        $mas1[$i]++;

	}

    //print_r($mas1);
    echo '<br>';


    $mas1 = array (4, 2=>8);			// ������� ������� ������� 4, ������� � �������� 2 ����� 8. ������� [4, , 8]
	$mas1[1] = 4;
	// ������ foreach
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
    reset($mas1);//�������� ��������� � ������
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

    $d = array ("�������", "�����", "�����������");
    usort($d, "func");  //user sort
    function func($a1, $a2){
      $ds = array(1 => "�����������", 2=>"�������", 3=>"�����");
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

    $mas3 = array("�������", "�����", "�����������");
    $mas4 = array(array("�������", "�����", "�����������"), array("�������", "����", "������"));
    foreach($mas3 as $ks => $mas31) {
        if ($mas3[$ks] == "�����"){
            $mas3[$ks] = "<span style = 'color:red'>$mas31</span>";
        }

    }
    print_r($mas3);
    echo "<br>";
    echo "<br>";

     foreach($mas4 as $k1 => $mas41) {
        foreach($mas41 as $k2 => $mas42) {
            if ($mas42 == "����"){
            $mas4[$k1][$k2] = "<span style = 'color:red'>$mas42</span>";
        }

        }
     }
     print_r($mas4);


    $mas3 = array("�������", "�����", "�����������");
    $mas4 = array(array("�������", "�����", "�����������"), array("�������", "����", "������"));
    if (in_array( '�����', $mas3)){
      $mas3[array_search('�����', $mas3)] = '<b>'.$mas3[array_search('�����', $mas3)].'</b>';
    }
    echo "<br>";  
    print_r($mas3);


?>


</body>
</html>
