<form>  <!-- %%% вообще - просто опять надо -->
<input type="text" name="param" size="30" onkeypress="if(event.which==13) {post_send('tbody', 'function.php', ['param'], [param.value]); return false;}">
<input type="button" name="marka" value="Найти марку" onclick="post_send('tbody', 'function.php', ['param', this.name], [param.value])">   <!-- +++++ name="marka", ['param', this.name] -->
<input type="button" name="model" value="Найти модель" onclick="post_send('tbody', 'function.php', ['param', this.name], [param.value])">  <!-- +++++ name="model", ['param', this.name] -->
</form>

<script>
var sl=document.getElementById('slider');
while(sl.childNodes.length) {sl.removeChild(sl.childNodes[0])};
var mass_img=new Array('lenovo.jpg', 'acer.jpg', 'hp.jpg');
var i=0;
clearInterval(int);
var int=setInterval('func_img()', 1500);
function func_img() {
if(i==mass_img.length) {clearInterval(int);}
else {
var sl_img=document.createElement('img');
sl_img.setAttribute('src', mass_img[i]);
sl.appendChild(sl_img);
}
i++;
}
</script>

