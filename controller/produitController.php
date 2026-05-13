<?php
require_once __DIR__."/../model/produitModel.php";

// Tableau des actions disponibles
$actions = [
    "lister" => "listeProduit",
    "new" => "newProduit",
    "supprimer" => "supprimerProduit",
    "modifier" => "modifierProduit"
];

// Récupération de l'action (par défaut "lister")
$action = $_REQUEST['action'] ?? "lister";

// Exécution de l'action si elle existe
if (array_key_exists($action, $actions)) {
    $fonction = $actions[$action];
    if (function_exists($fonction)) {
        $fonction();
    } else {
        echo "Erreur : fonction '$fonction' non trouvée";
    }
} else {
    echo "Erreur : action '$action' non trouvée";
}

// Actions
function listeProduit(){
    $produits = listerProduit();
    // Utiliser ROOT au lieu de __DIR__
    $vuePath = ROOT . "views/produit/lister.php";
    
    if (file_exists($vuePath)) {
        require_once $vuePath;
    } else {
        echo "Vue introuvable : " . $vuePath;
    }
}

function newProduit()
{
    if (isset($_POST['add-produit'])) {
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        
        ajoutProduit($libelle, $prix, $stock, $description);
        
        header("Location: " . WEBROOT . "?controller=produit&action=lister");
        exit();
    }
    
    $vuePath = ROOT . "views/produit/ajout.php";
    if (file_exists($vuePath)) {
        require_once $vuePath;
    } else {
        echo "Vue introuvable : " . $vuePath;
    }
}

function supprimerProduit(){
    if(isset($_GET['delete'])){
        $id = intval($_GET['delete']);
        deleteProduit($id);
        header("Location: " . WEBROOT . "?controller=produit&action=lister");
        exit();
    }
}

function modifierProduit()
{
    if(isset($_GET['id'])){
        $id = (int) $_GET['id'];
        $client = getProduitById($id);
        
        if(isset($_POST['update-produit'])){
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $stock = $_POST['stock'];
            $description = $_POST['description'];
            
            updateProduit($id, $libelle, $prix, $stock, $description);
            
            header("Location: " . WEBROOT . "?controller=produit&action=lister");
            exit();
        // }
    }

    require_once __DIR__ . '/../views/produit/ajout.php';
}
