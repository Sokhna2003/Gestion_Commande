<?php
$controllers = [
    "client" => "client",
    "produit" => "produit",
    "commande" => "commande"
];

$controller = $_REQUEST['controller'] ?? "client";

if (array_key_exists($controller,$controllers)){
    $path = ROOT."controller/".$controllers[$controller]."Controller.php";
}else{
    echo "controller introuvable";
}

require_once($path);