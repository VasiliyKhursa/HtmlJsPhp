<?php
	$a = 3;
	$b = 2;

	$glob="Глоб";

	func($a, $b);
	echo $a."<br>";
	function func($a, $b) {
        $a++;
		$c = $a + $b;
		echo $c."<br>";
	}
/*
	func(&$a, $b);
	echo $a."<br>";
*/
	globals();
    function globals() {

		$loc="Лок";

        echo $loc."<br>";
		echo $glob."<br>";
		echo $GLOBALS['glob']."<br>";


    	global $glob;
		echo $glob."<br>";
    }

	function func_stat () {
        $d = 0;
		static $e = 0;

		echo ++$d.' - '.++$e."<br>";
	}

    func_stat ();
	func_stat ();

    // Функции с параметрами поумолчанию
	function fll($u, $fl=1) {
		if ($fl == 1) {
            echo ++$u."<br>";
		}
		else {
            echo --$u."<br>";
		}

	}

	fll(5);
	fll(5,0);

    // Переменные-функции
	function write ($text) {
        echo $text."<br>";
	}

   function write_bold ($text) {
        echo "<b>".$text."</b>"."<br>";
	}

	write ("Текст");
	write_bold ("Текст");

	$var_func = "write";
	$var_func("Text write");

	$var_func = "write_bold";
	$var_func("Text write bold");

?>