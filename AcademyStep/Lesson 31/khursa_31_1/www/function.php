<?php

error_reporting(E_ERROR);

include_once 'massiv.php';  

class Table_mass {
public $dat, $res;
function Massiv() {
// 1. ####################################################################################
//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
$mas1=explode('||', $this->dat);
foreach($mas1 as $ke=>$mass) {
   $mas2=explode('|', $mass);
   foreach($mas2 as $kee=>$masss) {
       $mas12[$ke][$kee]=$masss;
   }
}
//print_r($mas12);
//$this->res=$mas12;
return $mas12;
// 1. ####################################################################################
}

function Algoritm0() {
// 2. ####################################################################################
//СОРТИРОВКА-ЦЕНА
sort($this->res);
// 2. ####################################################################################
}

function Algoritm1() {
$mas12=$this->res;
// 3. ####################################################################################
//ПОЛУЧАЕМ POST ПОИСКА
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
$this->res=$mas12;
$this->Algoritm0();
// 3. ####################################################################################
}

function Dom() {
// 4. ####################################################################################
//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
foreach($this->res as $ke12_=>$mas12_) {
  $rr="";
  foreach($mas12_ as $ke12__=>$mas12__) {
     $rr=$rr."<td>$mas12__</td>"; 
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
}

}
//////////////////////////////////////////////////////////////////////////////////////////
$obj=new Table_mass();
$obj->dat=$data;
$obj->res = $obj->Massiv();
//$obj->Algoritm0();
//$obj->Algoritm1();
$obj->Dom();


/*

abstract  class DB {
    abstract function open();     // нужно перегрузить  !!!!

    function close(){}            // можно не перегружать
}


class my_DB extends
*/

//
?>
