<form method="post" enctype="multipart/form-data" target="ifr" action="function.php">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="userfile[]" multiple="true">
<input type="submit" value="Записать" name="submit">
</form>

<iframe name="ifr" style="display:none;"></iframe>   <!-- style="display:none;" style="width:200px; height:200px;"-->

<form>
<input type="text" name="param" size="30" onkeypress="if(event.which==13) {post_send('tbody', 'function.php', ['param'], [param.value]); return false;}">
<input type="button" name="marka" value="Найти марку" onclick="post_send('tbody', 'function.php', ['param', this.name], [param.value])">
<input type="button" name="model" value="Найти модель" onclick="post_send('tbody', 'function.php', ['param', this.name], [param.value])">
</form>
