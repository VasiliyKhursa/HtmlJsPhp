<form>
<input type="text" name="param" size="30">
<input type="button" value="Найти марку" onclick="post_send('tbody', 'function.php', ['param'], [param.value])">
<input type="button" value="Очистить" onclick="post_send('tbody', 'function.php', ['param','null'], [param.value])">
</form>


