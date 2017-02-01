<?php

//ÔÎÐÌÈÐÓÅÌ ÑÒÐÎÊÓ È ÎÒÏÐÀÂËßÅÌ Â DOM
foreach($price as $ke12_=>$price_) {
    $rr="";
    foreach($price_ as $ke12__=>$price__) {
        $rr=$rr."<li>$price__</li>";
    }
    echo '<script>';
    echo 'var r_tbody=document.getElementById("div0");';
    echo 'var r_rr=document.createElement("ul");';
    echo "r_rr.innerHTML='$rr';";
    echo 'r_tbody.appendChild(r_rr);';
    echo '</script>';
}


/*
echo '<script>';
echo 'var r_tbod=document.getElementById("tbod");';
echo 'var r_tr=document.createElement("tr");';
//echo "r_tr.innerHTML='<td>$a</td><td>$b</td><td>$c</td>';";
echo 'r_tbod.appendChild(r_tr);';
echo '</script>';
  */
?>
