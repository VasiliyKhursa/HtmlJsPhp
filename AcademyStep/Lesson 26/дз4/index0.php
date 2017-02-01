﻿<html>
<head>
<style>
 td {background-color:whitesmoke; border:1px solid blue;}
</style>
</head>
<body>

<table>
<tbody>
<tr>
<td style="background-color:silver; text-align:center; font-weight:bold;">МАРКА</td>
<td style="background-color:silver; text-align:center; font-weight:bold;">МОДЕЛЬ</td>
<td style="background-color:silver; text-align:center; font-weight:bold;">ЦЕНА</td>
<td style="background-color:silver; text-align:center; font-weight:bold;">ВИД</td>  <!-- !!! -->
<td style="background-color:silver; text-align:center; font-weight:bold;">ДАТА</td>  <!-- !!! -->
</tr>
</tbody>
<tbody id="tbody">
</tbody>
</table>

<?php
//!!!ОТКЛЮЧАЕМ ПРЕДУПРЕЖДЕНИЯ
error_reporting(E_ERROR);

//!!!ПОЛУЧАЕМ МАССИВ ИЗОБРАЖЕНИЙ
if(isset($_FILES['userfile'])) {        //!!! (isset)
  $dir='/home/localhost/www/';
   for($i=0; $i<count($_FILES['userfile']['tmp_name']); $i++) {
     if(copy($_FILES['userfile']['tmp_name'][$i], $dir.$_FILES['userfile']['name'][$i])) {
        //echo $_FILES['userfile']['name'][$i].'<br>';        
     }
     else {
        echo 'Файл(ы) '.$_FILES['userfile']['name'][$i].' загрузить не удалось!<br>'; 
     }
   }
}

$data='ACER|ES1|5500||LENOVO|G50|5300||HP|G3|5100';

$sear='LENOVO';

//ДЕЛАЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА
$mas1=explode('||', $data);
foreach($mas1 as $ke=>$mass) {
   $mas2=explode('|', $mass);
   foreach($mas2 as $kee=>$masss) {
       $mas12[$ke][$kee]=$masss;
   }
/////////!!!ДОПОЛНЯЕМ ДВУМЕРНЫЙ МАССИВ МАРКА-МОДЕЛЬ-ЦЕНА СООТВЕТСТВУЮЩИМИ ИЗОБРАЖЕНИЯМИ И ДАТОЙ ЗАГРУЗКИ
    if(isset($_FILES['userfile'])) {                                   //!!! (isset)
         foreach($_FILES['userfile']['name'] as $kef=>$masf) {
            if(strpos(mb_strtoupper($masf), $mas12[$ke][0])!==false) { //!!! (mb_strtoupper) (!==false) 
               $mas12[$ke][]='<img src="'.$masf.'">'; 
               $mas12[$ke][]=date('d-m-Y');                            //!!! (date)
            }
         }
    }  
/////////!!!
}

//СОРТИРОВКА-ЦЕНА
//sort($mas12); //!!! НЕ ДАЕТ ЭФФЕКТА
usort($mas12, 'func'); //!!! ПОЛЬЗОВАТЕЛЬСКАЯ СОРТИРОВКА
function func($a1, $a2) {
   $a11=$a1[2]; // СОРТИРОВКА ПО ВТОРОМУ ИНДЕКСУ - ЦЕНЕ
   $a22=$a2[2];
   if($a11>$a22) {return 1;}
   else if($a11==$a22) {return 0;}
   else {return 0;}
}



//НАЙТИ($sear), ВЫДЕЛИТЬ, ПЕРЕМЕСТИТЬ, УДАЛИТЬ
foreach($mas12 as $ke12_=>$mas12_) { 
    if(in_array($sear, $mas12_)) { //НАЙТИ КЛЮЧ ЭЛЕМЕНТА-МАССИВА, ГДЕ ЕСТЬ ИСКОМОЕ
        $pos=array_search($sear, $mas12_); //НАЙТИ КЛЮЧ ИСКОМОГО ЭЛЕМЕНТА В ЭЛЕМЕНТЕ-МАССИВЕ
        $mas12[$ke12_][$pos]='<a href="#" style="color:red;">'.$sear.'</a>'; //ВЫДЕЛИТЬ ПО ДВУМ КЛЮЧАМ 

        //ПРИ НЕОБХОДИМОСТИ - ВЫДЕЛИТЬ ВСЕ ЭЛЕМЕНТЫ В ЭЛЕМЕНТЕ-МАССИВЕ, ГДЕ ЕСТЬ ИСКОМЫЙ ЭЛЕМЕНТ
        foreach($mas12[$ke12_] as $kee=>$masss) {
          if($kee!=$pos) {
            $mas12[$ke12_][$kee]='<span style="color:blue;">'.$mas12[$ke12_][$kee].'</span>'; 
          }
        }

        //ЭЛЕМЕНТ-МАССИВ СЧИТАТЬ В ПЕРЕМЕННУЮ, УДАЛИТЬ ИЗ СТАРОГО МЕСТА И ВСТАВИТЬ В НАЧАЛО
        $mass=$mas12[$ke12_];
        unset($mas12[$ke12_]); 
        array_splice($mas12, 0, 0, array($mass));       
        //array_unshift($mas12, $mass); //В ДАННОМ СЛУЧАЕ ВОЗМОЖНО - Т.К.ВСТАВКА В НАЧАЛО

    }  
}

//ФОРМИРУЕМ СТРОКУ И ОТПРАВЛЯЕМ В DOM
foreach($mas12 as $ke12_=>$mas12_) {
  $rr="";
  foreach($mas12_ as $ke12__=>$mas12__) {
     $rr=$rr."<td>$mas12__</td>"; 
  }
  echo '<script>';
  echo 'var r_tbody=document.getElementById("tbody");';
  echo 'var r_rr=document.createElement("tr");';
  echo "r_rr.innerHTML='$rr';";
  echo 'r_tbody.appendChild(r_rr);';
  echo '</script>';
}

?>

</body>
</html>
