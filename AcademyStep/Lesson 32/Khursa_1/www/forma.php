<form>
<input type="text" name="marka" size="10">
<input type="text" name="model" size="5">
<input type="text" name="cena" size="5">
<input type="button" value="записать" onclick="post_send('tbody', 'function.php', ['param', 'marka', 'model', 'cena'], [param.value, marka.value, model.value, cena.value]); marka.value = ''; model.value = ''; cena.value = '';">
<br>
<br>
<input type="text" name="param" size="30">
<input type="button" value="Найти марку" onclick="post_send('tbody', 'function.php', ['param'], [param.value])">
</form>


