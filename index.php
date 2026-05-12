<?php 
     define("WEBROOT","http://localhost:8000/");

     require_once __DIR__."/controller/clientController.php";

     
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
}

     
// require_once __DIR__."/views/client/ajout.php";

?>