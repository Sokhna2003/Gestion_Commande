<?php 
     define("WEBROOT","http://localhost:8000/");
     //var_dump([$_SERVER["DOCUMENT_ROOT"],substr($_SERVER["DOCUMENT_ROOT"],0,-6)]);
     die;
     define("ROOT",substr($_SERVER["DOCUMENT_ROOT"],0,-6));

     require_once __DIR__."/controller/clientController.php";
     require_once __DIR__."/controller/produitController.php";

     
$page = $_GET['page'] ?? 'lister';

if ($page == "delete") {
    supprimerCLient();
}
elseif ($page == "lister") {
    $clients = listerClient();
    require_once __DIR__."/views/client/lister.php";
}
elseif ($page == "ajout") {
    newClient();
}elseif($page == "update"){
     modifierClient();
}elseif($page == "listerp"){
     $produits = listerProduit();
     require_once __DIR__."/views/produit/listerp.php";
}
     
// require_once __DIR__."/views/client/ajout.php";

?>