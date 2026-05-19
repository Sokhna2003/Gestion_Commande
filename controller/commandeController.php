<?php
require_once __DIR__."/../model/commandeModel.php";

// Tableau des actions disponibles
$actions = [
    "lister" => "listecommande"
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
function listeCommande(){
    $commandes = listerCommande();
    // Utiliser ROOT au lieu de __DIR__
    $vuePath = ROOT . "views/commande/lister.php";
    
    if (file_exists($vuePath)) {
        require_once $vuePath;
    } else {
        echo "Vue introuvable : " . $vuePath;
    }
}