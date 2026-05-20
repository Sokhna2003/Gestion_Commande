<?php
require_once __DIR__."/../model/commandeModel.php";

// Tableau des actions disponibles
$actions = [
    "lister" => "listecommande",
    "new" => "newcommande",
    "details" => "detailscommande",
    // "supprimer" => "supprimercommande",
    // "modifier" => "modifiercommande"
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
function listecommande(){
    $commandes = listercommande(); // Récupérer les commandes
    $vuePath = ROOT . "views/commande/lister.php";
    
    if (file_exists($vuePath)) {
        require_once $vuePath;
    } else {
        echo "Vue introuvable : " . $vuePath;
    }
}

function newcommande()
{
    if (isset($_POST['add-commande'])) {
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        
        ajoutcommande($libelle, $description, $prix, $stock);
        
        header("Location: " . WEBROOT . "?controller=commande&action=lister");
        exit();
    }
    
    $vuePath = ROOT . "views/commande/ajout.php";
    if (file_exists($vuePath)) {
        require_once $vuePath;
    } else {
        echo "Vue introuvable : " . $vuePath;
    }
}

function supprimercommande(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        deletecommande($id);
        header("Location: " . WEBROOT . "?controller=commande&action=lister");
        exit();
    } else {
        // Debug si le paramètre n'est pas trouvé
        echo "Aucun ID de suppression reçu. GET reçu : ";
        print_r($_GET);
    }
}

function modifiercommande()
{
    // Récupérer l'ID depuis GET
    $id = isset($_GET['id']) ? (int) $_GET['id'] : (isset($_GET['update']) ? (int) $_GET['update'] : 0);
    
    if($id > 0){
        $commande = getcommandeById($id);
        
        // Vérifier si le commande existe
        if(!$commande) {
            die("commande non trouvé avec l'ID : " . $id);
        }
        
        if(isset($_POST['update-commande'])){
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $stock = $_POST['stock'];
            
            updatecommande($id, $libelle, $description, $prix, $stock);
            
            header("Location: " . WEBROOT . "?controller=commande&action=lister");
            exit();
        }
        
        $vuePath = ROOT . "views/commande/ajout.php";
        if (file_exists($vuePath)) {
            require_once $vuePath;
        } else {
            echo "Vue introuvable : " . $vuePath;
        }
    } else {
        echo "ID commande non valide";
    }
}
?>
