<?php
require_once __DIR__."/../model/produitModel.php";
require_once __DIR__."/../config/validator.php";

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
    // $vuePath = ROOT . "views/produit/lister.php";
    loadView("produit/lister",["produits"=>$produits]);
    
    // if (file_exists($vuePath)) {
    //     require_once $vuePath;
    // } else {
    //     echo "Vue introuvable : " . $vuePath;
    // }
}

function newProduit()
{
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-produit'])) {
        $errors = validDataProduit($_POST);
    
        if (empty($errors)) {
            $reference = trim($_POST['reference']);
            $libelle = trim($_POST['libelle']);
            $description = trim($_POST['description']);
            $prix = (float)$_POST['prix'];
            $stock = (int)$_POST['stock'];
            
            ajoutProduit($reference, $libelle, $description, $prix, $stock);
            
            redirectTo("produit","lister");
            exit();
        }
    }
    // $vuePath = ROOT . "views/produit/ajout.php";
    // if (file_exists($vuePath)) {
    //     require_once $vuePath;
    // } else {
    //     echo "Vue introuvable : " . $vuePath;
    // }
    loadView("produit/ajout",["errors"=>$errors]);
}

function supprimerProduit(){
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if($id > 0){
        // $id = intval($_GET['id']);
        deleteProduit($id);
        // header("Location: " . WEBROOT . "?controller=produit&action=lister");
        // exit();
    } 
    redirectTo("produit", "lister");
    exit();
    // else {
    //     // Debug si le paramètre n'est pas trouvé
    //     echo "Aucun ID de suppression reçu. GET reçu : ";
    //     print_r($_GET);
    // }
}

function modifierProduit()
{
    // Récupérer l'ID depuis GET
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0 ;
    $errors = [];
    if($id > 0){
        $produit = getProduitById($id);
        
        // Vérifier si le produit existe
        if(!$produit) {
            die("Produit non trouvé avec l'ID : " . $id);
        }
        // Si le formulaire de modification est soumis
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-produit'])){
            $errors = validDataProduit($_POST);
            if (empty($errors)) {
                $reference = trim($_POST['reference']);
                $libelle = trim($_POST['libelle']);
                $description = trim($_POST['description']);
                $prix = (float)$_POST['prix'];
                $stock = (int)$_POST['stock'];
                
                updateProduit($id, $reference, $libelle, $description, $prix, $stock);
                
                redirectTo("produit","lister");
                // header("Location: " . WEBROOT . "?controller=produit&action=lister");
                exit();
            }
            
        }
        
        // $vuePath = ROOT . "views/produit/ajout.php";
        // if (file_exists($vuePath)) {
        //     require_once $vuePath;
        // } else {
        //     echo "Vue introuvable : " . $vuePath;
        // }
        loadView("produit/ajout",["errors"=>$errors, "produit"=>$produit]);

    } else {
        echo "ID produit non valide";
    }
}
?>
