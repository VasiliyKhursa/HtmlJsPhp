<?php
    if (isset($_GET['menu'])) {
      switch($_GET['menu']){
        case 'auto':    include_once 'auto.php';

                        echo '<script>
                        conteyner.style.backgroundColor = "black";
                        </script>';

                        break;

        case 'sport':   include_once 'sport.php';

                       /* echo '<script>
                        var cont = document.getElementById("sport");
                        var el_new = document.createElement("a");
                        el_new.setAttribute("href", "#");
                        el_new.setAttribute("style", "position: absolute; z-index: 1;");
                        el_new.innerHTML = "Расписание турниров";
                        cont.insertBefore(el_new, cont.firstChild);
                        </script>';
                        */
                        break;

        case 'nature':  include_once 'nature.php';
                        break;

        default:        include_once 'hello.php';


      }

    } else {
      include_once 'hello.php';
    }

?>