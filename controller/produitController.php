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
    $produits = listerProduit(); // Récupérer les produits
    $vuePath = ROOT . "views/produit/listerp.php";
    
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
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        
        ajoutProduit($libelle, $description, $prix, $stock);
        
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
    // Récupérer l'ID depuis GET
    $id = isset($_GET['id']) ? (int) $_GET['id'] : (isset($_GET['update']) ? (int) $_GET['update'] : 0);
    
    if($id > 0){
        $produit = getProduitById($id);
        
        // Vérifier si le produit existe
        if(!$produit) {
            die("Produit non trouvé avec l'ID : " . $id);
        }
        
        if(isset($_POST['update-produit'])){
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $stock = $_POST['stock'];
            
            updateProduit($id, $libelle, $description, $prix, $stock);
            
            header("Location: " . WEBROOT . "?controller=produit&action=lister");
            exit();
        }
        
        $vuePath = ROOT . "views/produit/ajout.php";
        if (file_exists($vuePath)) {
            require_once $vuePath;
        } else {
            echo "Vue introuvable : " . $vuePath;
        }
    } else {
        echo "ID produit non valide";
    }
}
?>
