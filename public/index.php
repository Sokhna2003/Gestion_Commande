<?php 
     define("WEBROOT","http://localhost:8000/");
     //var_dump([$_SERVER["DOCUMENT_ROOT"],substr($_SERVER["DOCUMENT_ROOT"],0,-6)]);
     //die;
     define("ROOT",substr($_SERVER["DOCUMENT_ROOT"],0,-6));

     //define("ROOT", substr($_SERVER["DOCUMENT_ROOT"], 0, -6));

    require_once ROOT . "router/router.php";


?>