<?php
$controllers=[
    "client"=>"client",
    "commande"=>"commande",
    "produit"=>"produit",
    "dashboard"=>"dashboard",
    //"auth"=>"auth"

];

 $controller=$_REQUEST["controller"]??"client";
 
 if (array_key_exists($controller, $controllers)) {
     $path=ROOT."controller/".$controllers[$controller]."Controller.php";
     }
     else{
         echo "controller introuvable";
         exit();
}
         
 require_once($path);