<?php

echo '
<div id="forma">
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

 	</script>
   ';
 ?>