<?php
//error_reporting(E_ERROR);
defined($_POST['php']) or die;
?>

<form>
<input type="text" name="param" size="30">
<input type="button" value="Найти марку" onclick="post_send('tbody', 'function.php', ['param','sesId'], [param.value, ses_id()])">
</form>

<script>
// функция достает id элемента span
function ses_id () {
    if (document.getElementById('ses')) {
        return document.getElementById('ses').innerHTML;
    }
    else {
        return '';
    }
}

</script>