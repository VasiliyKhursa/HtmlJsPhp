<html>
<head>
<meta http-equiv="Content-Type" content="texthtml; charset=utf-8" />
<style>
   .men {
        display:table;
        display:table-cell;
        text-align:center;
        vertical-align:middle;
        width:100px;
        height:30px;
        color:slategray;
        background-color:lightgreen;
        font-weight:bold;
        border:1px solid darkseagreen;
        border-radius:4px;
        cursor:pointer;
        }

   .men:hover {
        background-color:blue;
        }
   #conteyner {
        width: 1024px;
        margin: 0px auto;
        background-color: silver;
        box-sizing: border-box;
   }

</style>
</head>
<body>

    <div id = "conteyner">
        <?php
            //print_r($_GET);

            include_once "header.php";
            include_once "load.php";
            include_once "footer.php";
        ?>


    </div>
</body>
</html>
