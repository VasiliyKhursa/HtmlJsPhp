<?php

error_reporting(E_ERROR);

include_once 'massiv.php';


class Table_mass {
    public  $dat, $res;

	function Massiv() {
	// 1. ####################################################################################
	//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
	$mas1=explode('||', $this->dat);
	foreach($mas1 as $ke=>$mass) {
	  $mas2=explode('|', $mass);
	  foreach($mas2 as $kee=>$masss) {
	      $mas12[$ke][$kee]=$masss;     //  область видимости внутри метода
	  }
	}
	$this -> res = $mas12;		// передаем массив в область вдимости для сего касса
	// 1. ####################################################################################
    }

	function Algoritm0(){
	// 2. ####################################################################################
	//СОРТИРОВКА-ЦЕНА
	sort($this -> res);
	// 2. ####################################################################################
    }


	function Algoritm1(){
	// 3. ####################################################################################
	//ПОЛУЧАЕМ POST ПОИСКА
	$mas12 = $this -> res;  // передаем массив вмеод
	if(isset($_POST['param'])) {
	//НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ
	foreach($mas12 as $ke12_=>$mas12_) {
	     if(strpos($mas12_[0], mb_strtoupper($_POST['param'], 'utf-8'))!==false) {
	       $mas12[$ke12_][0]='<a href="#" style="color:red;">'.$mas12[$ke12_][0].'</a>';
	       //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
	       foreach($mas12[$ke12_] as $kee=>$masss) {
	         if($kee!=0) {
	           $mas12[$ke12_][$kee]='<span style="color:blue;">'.$mas12[$ke12_][$kee].'</span>';
	         }
	       }
	       //ЭЛЕМЕНТ-МАССИВ СЧИТАТЬ В ПЕРЕМЕННУЮ, УДАЛИТЬ ИЗ СТАРОГО МЕСТА И ВСТАВИТЬ В НАЧАЛО
	       $mass=$mas12[$ke12_];
	       unset($mas12[$ke12_]);
	       array_splice($mas12, 0, 0, array($mass));
	   }
	}
	}
	 $this -> res = $mas12;  // передаемво внешнюю переменную
	// 3. ####################################################################################

    //$this -> Algoritm0();
    }

	function Dom(){
		$mas12 = $this -> res;  // передаем массив вмеод
	// 4. ####################################################################################
	//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
	foreach($mas12 as $ke12_=>$mas12_) {
	 $rr="";
	 foreach($mas12_ as $ke12__=>$mas12__) {
	 	$st="background-color:$this->color;";
		$st=$st."color:$this->font_color;";
	    $rr=$rr."<td style=$st>$mas12__</td>";
	 }
	 if(isset($_POST['param'])) {
	    $rr="<tr>$rr</tr>";
	    echo $rr;
	 }
	 else {
	    echo '<script>';
	    echo 'var r_tbody=document.getElementById("tbody");';
	    echo 'var r_rr=document.createElement("tr");';
	    echo "r_rr.innerHTML='$rr';";
	    echo 'r_tbody.appendChild(r_rr);';
	    echo '</script>';
	 }
	}
	// 4. ####################################################################################
	$this -> res = $mas12;  // передаемво внешнюю переменную
    }
}

class Table_fon extends Table_mass{

	function Fon ($ress, $col, $font_col) {
		$this -> res = $ress;
        $this -> color = $col;
		$this -> font_color = $font_col;
		$this -> Dom();
	}

}



$obj = new Table_mass();    	// создание объекта
$obj -> dat = $data;      		// записываем внутрь
$obj -> Massiv();  				//вызо метода
//$obj -> Algoritm0();  				//вызо метода
$obj -> Algoritm1();  				//вызо метода
//$obj -> Dom();



$obj_dom = new Table_fon(); 	// создаем наследуемый класс
$obj_dom -> Fon($obj -> res, "red", "white");   // вызываем метод

?>
