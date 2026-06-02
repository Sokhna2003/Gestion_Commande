<?php 
//
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
//      define("WEBROOT","http://localhost:8000/");

     //var_dump([$_SERVER["DOCUMENT_ROOT"],substr($_SERVER["DOCUMENT_ROOT"],0,-6)]);
     //die;

    //
    //  define("ROOT",substr($_SERVER["DOCUMENT_ROOT"],0,-6));

     //define("ROOT", substr($_SERVER["DOCUMENT_ROOT"], 0, -6));
    //require_once ROOT."views/fixe/header.php";

    //
    // require_once ROOT. "config/helper.php";
    // require_once ROOT. "config/validator.php";
    // require_once ROOT . "router/router.php";

    define("WEBROOT","http://localhost:8000/");
    define("ROOT", str_replace("public","",$_SERVER['DOCUMENT_ROOT']));
    if(session_status() == PHP_SESSION_NONE){session_start();}

    require_once ROOT."config/helper.php";
    require_once ROOT."config/validator.php";
    // require_once ROOT."view/partials/header.php";

    require_once("../router/router.php"); 

?>