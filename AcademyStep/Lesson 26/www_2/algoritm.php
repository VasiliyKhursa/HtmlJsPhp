<?php

/*
if(isset($_POST['auto'])){
	include_once 'header.php';
include_once 'mass_auto.php';

include_once 'result.php';
}
if(isset($_POST['zapchasty'])){
	include_once 'heder1.php';
include_once 'mass_zapcasti.php';

include_once 'result1.php';
}
*/

switch (key($_POST)) {
	case 'auto' :
		include_once 'header.php';
		include_once 'mass_'.key($_POST).'.php';
		$algg = 'alg_'.key($_POST);
		$algg();
		//alk1();
		include_once 'result.php';

	break;

	case 'zapcasti' :
		include_once 'heder1.php';
		include_once 'mass_'.key($_POST).'.php';
		//alk1();
		$algg = 'alg_'.key($_POST);
		$algg();
		include_once 'result1.php';

	break;

	default:
	break;
}

function alk1 () {
	global $price;
	usort($price, 'func_sort');
}

function alg_auto () {
	global $price;


	foreach($price as $k1 => $str) {
       foreach($str as $k2 => $elem) {
          $price[$k1][$k2]  = '<span style="color:red";>'.$price[$k1][$k2] .'</span>';
       }
	}
	usort($price, 'func_sort');
}

function alg_zapcasti () {
	global $price;

		foreach($price as $k1 => $str) {
       foreach($str as $k2 => $elem) {
          $price[$k1][$k2]  = '<span style="color:blue";>'.$price[$k1][$k2] .'</span>';
       }
	}

	usort($price, 'func_sort');
}


function func_sort($a1,$a2){

    if($a1[2]>$a2[2]) {return 1;}
    else if($a11==$a22) {return 0;}
    else {return -1;}
}



?>