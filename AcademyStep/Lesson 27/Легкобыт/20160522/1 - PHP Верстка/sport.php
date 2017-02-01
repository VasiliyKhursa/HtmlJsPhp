<div id="sport" style="text-align:center;">
   <img src="sport.jpg" style="vertical-align:bottom;">
</div>

<script>
    var cont = document.getElementById("sport");
    var el_new = document.createElement("a");
    el_new.setAttribute("href", "#");
    el_new.setAttribute("style", "position: absolute; z-index: 1;");
    el_new.innerHTML = "Расписание турниров";
    cont.insertBefore(el_new, cont.firstChild);
</script>