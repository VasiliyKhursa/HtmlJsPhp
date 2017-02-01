<?php


if(isset($_FILES['userfile'])) {
$dir='/home/khursa_29_1/www/';

echo "<script>
	var cont = window.parent.document.getElementById('content');
	var r_img_new = cont.getElementsByTagName('img');
	while(r_img_new.length) {
        cont.removeChild(r_img_new[0]);
	}
	</script>";

 for($i=0; $i<count($_FILES['userfile']['tmp_name']); $i++) {
   if(copy($_FILES['userfile']['tmp_name'][$i], $dir.$_FILES['userfile']['name'][$i])) {
           //echo $_FILES['userfile']['name'][$i].'<br>';
		   echo "<script>
                var cont = window.parent.document.getElementById('content');

				var img_new = window.parent.document.createElement('img');

				img_new.setAttribute('src','".$_FILES['userfile']['name'][$i]."');

				cont.appendChild(img_new);

				</script>";
   }
   else {
        echo 'Файл(ы) '.$_FILES['userfile']['name'][$i].' загрузить не удалось!<br>';
   }
 }
}


if(isset($_POST['auto']) or isset($_POST['zapcasti'])) {
   include_once 'mass_'.key($_POST).'.php';

	$algoritm='algoritm_'.key($_POST);
	$algoritm();
}

function algoritm1() {
   global $price;
   usort($price, 'func');
}   

function algoritm_auto() {
   global $price;
   usort($price, 'func');
   foreach($price as $k1=>$mas1) {
   		$rr = '';
      foreach($mas1 as $k2=>$mas2) {
         $price[$k1][$k2]='<span style="color:sienna;">'.$mas2.'</span>';
		 $rr = $rr."<td>".$price[$k1][$k2]."</td>";
      }
      $rr = "<tr>".$rr."</tr>";
	  echo $rr;
   }
}   

function algoritm_zapcasti() {
   global $price;
   usort($price, 'func');
   foreach($price as $k1=>$mas1) {
   		$rr = '';
      foreach($mas1 as $k2=>$mas2) {
         $price[$k1][$k2]='<span style="color:green">'.$mas2.'</span>';
		  $rr = $rr."<td>".$price[$k1][$k2]."</td>";
      }
	  $rr = "<tr>".$rr."</tr>";
	  echo $rr;
   }
}

function func($a1, $a2) {
   $a11=$a1[2];
   $a22=$a2[2];
   if($a11>$a22) {return 1;}
   else if($a11==$a22) {return 0;}
   else {return -1;}
}

/*
	if(isset($_GET[menu])) {
		switch($_GET[menu]) {
			case button: echo  '<div id="forma">
								<form>
								<input type="button" value="Автомобили" name="auto" onclick=\'post_send("tbod","algoritm.php",[this.name],[]);\'>
								<input type="button" value="Запчасти" name="zapcasti" onclick=\'post_send("tbod","algoritm.php",[this.name],[]);\'>
								<input type="button" value="Запчасти" name="zapcasti" onclick=\'post_send_1(this.name);\'>
								</form>
								</div>

   								<script>
								var mass_img=new Array("lenovo.jpg", "acer.jpg", "hp.jpg");
								var i=0;
								setInterval("func_img()", 1500);
								function func_img() {
								i++;
								if(i==mass_img.length) {i=0;}
								var sl=document.getElementById("slider");
								sl.innerHTML="<img src="+mass_img[i]+">";
								}
								</script>'
								;
			break;
			//case...


	   }
	}
*/
?>