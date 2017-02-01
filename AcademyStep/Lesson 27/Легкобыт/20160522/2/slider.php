<div id = "slider" style = "background-color:white; width: 200px; float: left; text-align: center">
    slider
</div>

<script>
    var mas = new Array("acer.jpg", "lenovo.jpg", "hp.jpg");
    var i = 0;
    setInterval("funk_img()", 1500);
    function funk_img(){
      i++;
      if(i == mas.length) {
        i = 0;
      }

      var sl = document.getElementById('slider');
      sl.innerHTML = "<img src="+mas[i]+">"
    }
</script>