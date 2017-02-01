<?php

// ОТКЛЮЧАЕМ ПРЕДУПРЕЖДЕНИЯ
error_reporting(E_ERROR);

include_once 'massiv.php';

////////////////////////////////////////////////////////
class Table_mass {
public $dat, $res;
//======================================================
function Massiv() {
// ПОЛУЧАЕМ МАССИВ ИЗОБРАЖЕНИЙ
if(isset($_FILES['userfile'])) {
$dir='/home/localhost/www/';
 for($i=0; $i<count($_FILES['userfile']['tmp_name']); $i++) {
   //copy($_FILES['userfile']['tmp_name'][$i], $dir.$_FILES['userfile']['name'][$i]);
   if(copy($_FILES['userfile']['tmp_name'][$i], $dir.$_FILES['userfile']['name'][$i])) {
           //echo $_FILES['userfile']['name'][$i].'<br>';
   }
   else {
        echo 'Файл(ы) '.$_FILES['userfile']['name'][$i].' загрузить не удалось!<br>';
   }
 }
}

//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
$mas1=explode('||', $this->dat);
foreach($mas1 as $ke=>$mass) {
   $mas2=explode('|', $mass);
   foreach($mas2 as $kee=>$masss) {
       $mas12[$ke][$kee]=$masss;
   }
///////// ДОПОЛНЯЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА СООТВЕТСТВУЮЩИМИ ИЗОБРАЖЕНИЯМИ И ДАТОЙ ЗАГРУЗКИ
    if(isset($_FILES['userfile'])) {                       
         foreach($_FILES['userfile']['name'] as $kef=>$masf) {
            if(strpos(mb_strtoupper($masf), $mas12[$ke][0])!==false) {  
               $mas12[$ke][]='<img src="'.$masf.'">'; 
               $mas12[$ke][]=date('d-m-Y');                            
            }
         }
    }  
/////////
}
//print_r($mas12);
$this->res=$mas12;
}
//======================================================
function Algoritm0() {
//СОРТИРОВКА
sort($this->res);
}
//======================================================
function Algoritm1() {
$mas12=$this->res;
// ПОЛУЧАЕМ POST ПОИСКА
if(isset($_POST['param'])) {
// НАЙТИ ВВЕДЕННОЕ, ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ
 foreach($mas12 as $ke12_=>$mas12_) { //+++++ $this->kluc
      if(strpos($mas12_[$this->kluc], mb_strtoupper($_POST['param']))!==false) { // НАЙТИ ВХОЖДЕНИЕ В "МАРКУ" - ЭЛЕМЕНТ "0"(УЖЕ БЕЗ in_array)
        $mas12[$ke12_][$this->kluc]='<a href="#" style="color:red;">'.$mas12[$ke12_][$this->kluc].'</a>'; // ВЫДЕЛИТЬ ПО ВНЕШНЕМУ КЛЮЧУ(СТРОКА) ЭЛЕМЕНТ "0" (УЖЕ БЕЗ array_search)
        //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
        foreach($mas12[$ke12_] as $kee=>$masss) { 
          if($kee!=$this->kluc) {                                                // ВЫДЕЛИТЬ В ТОЙ ЖЕ СТРОКЕ, ЕСЛИ ЭЛЕМЕНТ НЕ "0"
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
}
//======================================================
function Dom() {

//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
  if(isset($_FILES['userfile'])) {
     echo '<script>';
     echo 'var r_tbody=window.parent.document.getElementById("tbody");';
     echo 'while(r_tbody.childNodes.length) {r_tbody.removeChild(r_tbody.childNodes[0]);};';
     echo '</script>';
  }
foreach($this->res as $ke12_=>$mas12_) {
  $rr="";
  foreach($mas12_ as $ke12__=>$mas12__) {
     //$rr=$rr."<td>$mas12__</td>";
     $st="background-color:$this->color;";
     $rr=$rr."<td style=$st>$mas12__</td>";
  }
  if(isset($_POST['param'])) {
     $rr="<tr>$rr</tr>";
     echo $rr;                                                
  }
  else {
     echo '<script>';
     echo 'var r_tbody=window.parent.document.getElementById("tbody");';
     echo 'var r_rr=window.parent.document.createElement("tr");';
     echo "r_rr.innerHTML='$rr';";
     echo 'r_tbody.appendChild(r_rr);';
     echo '</script>';
  }
}
}
//======================================================
}
////////////////////////////////////////////////////////
class Table_dom extends Table_mass {
function Dom_fon($ress, $cvet) {
    $this->res=$ress;
    $this->color=$cvet;
    $this->Dom();
}
}
class Table_algoritm extends Table_mass {
function Algoritm_kluc($ress, $klucc) {
    $this->res=$ress;
    $this->kluc=$klucc;
    $this->Algoritm1();
}
}
////////////////////////////////////////////////////////
$obj=new Table_mass();
$obj->dat=$data;
$obj->Massiv();
$obj->Algoritm0();
//$obj->Algoritm1();
//$obj->Dom();
$obj_dom=new Table_dom();
$obj_algoritm=new Table_algoritm();
if(isset($_POST['marka'])) {$obj_algoritm->Algoritm_kluc($obj->res, 0); $obj_dom->Dom_fon($obj_algoritm->res, 'khaki');} //+++++ $_POST['marka'], $obj_algoritm->res
else if(isset($_POST['model'])) {$obj_algoritm->Algoritm_kluc($obj->res, 1); $obj_dom->Dom_fon($obj_algoritm->res, 'lavender');} //+++++ $_POST['model'], $obj_algoritm->res
else {$obj->Dom();}
?>
