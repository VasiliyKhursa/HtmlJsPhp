<?php

error_reporting(E_ERROR);

include_once 'massiv.php';  

class Table_mass {
public $dat, $res;
private function Massiv() {
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
$this->res=$mas12;
// 1. ####################################################################################
}
function Massive_Pablic(){

 $mas1=explode('||', $this->dat);
foreach($mas1 as $ke=>$mass) {
   $mas2=explode('|', $mass);
   foreach($mas2 as $kee=>$masss) {
       $mas12[$ke][$kee]=$masss;
   }
}
//print_r($mas12);
$this->res=$mas12;
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
        $mas12[$ke12_][0]='<a href="#" style="color:'.$this->color.';">'.$mas12[$ke12_][0].'</a>';
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
//print_r($this->res);
foreach($this->res as $ke12_=>$mas12_) {
  $rr="";
  foreach($mas12_ as $ke12__=>$mas12__) {
     $st="background-color:$this->color;color:$this->colorr;";
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
}

function Base_Dom($ress,$col,$coll){
   $this->res =$ress;
   $this->color=$col;
   $this->colorr=$coll;
   $this->Dom_write();
}

}
//////////////////////////////////////////////////////////////////////////////////////////
class Table_fon extends Table_mass {
function Fon($ress, $cvet, $cvett) {
    $this->res=$ress;
    $this->color=$cvet;
    $this->colorr=$cvett;
    $this->Dom();
}
}
class Alg_cvet extends Table_mass{

function Cvet($ress,$col){
 $this->res=$ress;
 $this->color=$col;
 $this->Algoritm1();
}
}

class Dom_table extends Table_mass{

function Dom_write(){

foreach($this->res as $ke12_=>$mas12_) {
  $rr="";
  foreach($mas12_ as $ke12__=>$mas12__) {
     $st="background-color:$this->color;color:$this->colorr;";
     $rr=$rr."<td style=$st>$mas12__</td>";
  }
 // if(isset($_POST['param'])) {
     $rr="<tr>$rr</tr>";
     echo $rr;
  //}
  //else// {
     echo '<script>';
     echo 'var r_tbody=document.getElementById("tbody");';
     echo 'var r_rr=document.createElement("tr");';
     echo "r_rr.innerHTML='$rr';";
     echo 'r_tbody.appendChild(r_rr);';
     echo '</script>';
  //}
}

}
}

class Dom_list extends Table_mass{

 function Dom_write(){

  foreach($this->res as $ke12_=>$mas12_) {
  $rr="";
  foreach($mas12_ as $ke12__=>$mas12__) {
     $st="background-color:$this->color;color:$this->colorr;";
     $rr=$rr."<li style=$st>$mas12__</li>";
  }
  if(isset($_POST['param'])) {
     $rr="<ol>$rr</ol>";
     echo $rr;
  }
  else {
     echo '<script>';
     echo 'var r_tbody=document.getElementById("div0");';
     echo 'var r_rr=document.createElement("ol");';
     echo "r_rr.innerHTML='$rr';";
     echo 'r_tbody.appendChild(r_rr);';
     echo '</script>';
  }
}


 }
}

//////////////////////////////////////////////////////////////////////////////////////////
$obj_dom_table = new Dom_table();
$obj_dom_list = new Dom_list();

$obj=new Table_mass();
$obj_alg =new Alg_cvet();
$obj->dat=$data;
//$obj->dat='A1|A2|A3||B1|B2|B3||C1|C2|C3';
$obj->Massive_Pablic();
//$obj->Algoritm0();
//$obj->Algoritm1();
$obj_alg -> Cvet($obj->res,'gold');
//$obj->Dom();
$obj_fon=new Table_fon();

if(!isset($_POST['param'])){
//' $obj->Dom();
 $obj_dom_list -> Base_Dom($obj->res,'sienna','white');
}
else{
  //  $obj_fon->Fon($obj_alg->res, 'sienna', 'white');
     $obj_dom_table -> Base_Dom($obj->res,'sienna','white');
}



?>
