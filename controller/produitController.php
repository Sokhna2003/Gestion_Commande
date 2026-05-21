<?php
session_start();
require_once ROOT."/model/produitModel.php";
require_once ROOT."/config/validator.php";

$liste = function(){
    $produits = listerProduit();
    $total_produits = countTable("produit");
    loadView("produit/liste", [
        "produits" => $produits,
        "total_produits" => $total_produits
    ]);
};

$new = function(){
    $errors = $_SESSION["errors_produit"] ?? [];
    unset($_SESSION["errors_produit"]);
    
    loadView("produit/ajout", [
        "errors" => $errors,
        "produit" => null
    ]);
};

$save = function(){
    $errors = validDataProduit($_POST);
    
    if(empty($errors)){
        $reference   = trim($_POST['reference']);
        $libelle     = trim($_POST['libelle']);
        $description = trim($_POST['description']);
        $prix        = (float)$_POST['prix'];
        $stock       = (int)$_POST['stock'];
        
        ajoutProduit($reference, $libelle, $description, $prix, $stock);
        
        redirectTo("produit", "liste");
    } else {
        $_SESSION["errors_produit"] = $errors;
        redirectTo("produit", "new");
    }
};

$modifier = function(){
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $errors = $_SESSION["errors_produit"] ?? [];
    unset($_SESSION["errors_produit"]);
    
    if($id > 0){
        $produit = getProduitById($id);
        if(!$produit){
            $_SESSION["error_message"] = "Produit non trouvé";
            redirectTo("produit", "liste");
            return;
        }
        loadView("produit/ajout", [
            "errors" => $errors,
            "produit" => $produit
        ]);
    } else {
        redirectTo("produit", "liste");
    }
};

$update = function(){
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $errors = validDataProduit($_POST);
    
    if($id > 0 && empty($errors)){
        $reference   = trim($_POST['reference']);
        $libelle     = trim($_POST['libelle']);
        $description = trim($_POST['description']);
        $prix        = (float)$_POST['prix'];
        $stock       = (int)$_POST['stock'];
        
        updateProduit($id, $reference, $libelle, $description, $prix, $stock);
        
        redirectTo("produit", "liste");
    } else {
        $_SESSION["errors_produit"] = $errors;
        redirectTo("produit", "modifier&id=" . $id);
    }
};

$supprimer = function(){
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if($id > 0){
        dlistereleteProduit($id);
    }
    redirectTo("produit", "liste");
};

$actions = [
    "liste"     => $liste,
    "new"       => $new,
    "save"      => $save,
    "modifier"  => $modifier,
    "update"    => $update,
    "supprimer" => $supprimer
];

$action = $_REQUEST["action"] ?? "liste";

if(array_key_exists($action, $actions)){
    $actions[$action]();
} else {
    echo "Page introuvable produit";
    exit();
}
?>