<?php
require_once ROOT."/model/commandeModel.php";

$liste=function(){
$commandes = getAllcommandes();
$total_commandes=countTable("commande");
loadView("commandes/liste",["commandes"=>$commandes,"total_commandes"=>$total_commandes]);

};

//$ajout = function(){
//    loadView("commande/ajout", [], "side");
//};

//$detail = function(){
//    if(isset($_GET["id"])){
//        $commande = getCommandeById($_GET["id"]);
//        if($commande){
//            loadView("commande/detail", ["commande"=>$commande]);
//        } else {
//            echo "Commande non trouvée";
//        }
//    } else {
//        echo "ID commande manquant";
//    }
//};

$modifier = function(){
    echo "Je modifie une commande";
};

$supprimer = function(){
    echo "Je supprime une commande";
};

$actions = [
    "liste"=>$liste,
    "ajout"=>$ajout,
    "detail"=>$detail,
    "modifier"=>$modifier,
    "supprimer"=>$supprimer
];

$action = $_REQUEST["action"] ?? "liste";

if (array_key_exists($action, $actions)) {
    $actions[$action]();
} else {
    echo "Page introuvable commande";
    exit();
}