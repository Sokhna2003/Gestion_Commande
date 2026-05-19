<?php
require_once __DIR__."/../model/clientModel.php";

// Tableau des actions disponibles
$actions = [
    "lister" => "listeClient",
    "new" => "newClient",
    "supprimer" => "supprimerClient",
    "modifier" => "modifierClient"
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
function listeClient(){
    $clients = listerClient();
    // Utiliser ROOT au lieu de __DIR__
    $vuePath = ROOT . "views/client/lister.php";
    
    if (file_exists($vuePath)) {
        require_once $vuePath;
    } else {
        echo "Vue introuvable : " . $vuePath;
    }
}

function newClient()
{
    if (isset($_POST['add-client'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
        
        ajoutClient($nom, $prenom, $telephone, $email, $adresse);
        
        header("Location: " . WEBROOT . "?controller=client&action=lister");
        exit();
    }
    
    $vuePath = ROOT . "views/client/ajout.php";
    if (file_exists($vuePath)) {
        require_once $vuePath;
    } else {
        echo "Vue introuvable : " . $vuePath;
    }
}

function supprimerClient(){
    if(isset($_GET['delete'])){
        $id = intval($_GET['delete']);
        deleteClient($id);
        header("Location: " . WEBROOT . "?controller=client&action=lister");
        exit();
    }
}

function modifierClient()
{
    if(isset($_GET['id'])){
        $id = (int) $_GET['id'];
        $client = getClientById($id);
        
        if(isset($_POST['update-client'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $adresse = $_POST['adresse'];
            
            updateClient($id, $nom, $prenom, $telephone, $email, $adresse);
            
            header("Location: " . WEBROOT . "?controller=client&action=lister");
            exit();
        }
        
        $vuePath = ROOT . "views/client/ajout.php";
        if (file_exists($vuePath)) {
            require_once $vuePath;
        } else {
            echo "Vue introuvable : " . $vuePath;
        }
    }
}
?>