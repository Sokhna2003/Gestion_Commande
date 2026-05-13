<?php
$controllers = [
    "client" => "client",
    "produit" => "produit",
    "commande" => "commande"
];

$controller = $_REQUEST['controller'] ?? "client";

// Rendre $controller disponible globalement
//global $controller;

if (array_key_exists($controller, $controllers)){
    $path = ROOT."controller/".$controllers[$controller]."Controller.php";
    
    if (file_exists($path)) {
        require_once($path);
    } else {
        echo "Fichier controller introuvable : " . $path;
    }
} else {
    echo "controller introuvable";
}
?>