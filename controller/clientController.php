<?php
require_once ROOT."/model/clientModel.php";

$liste = function(){
    $clients = listerClient();
    $total_client = countClients();
    loadView("client/lister", ["clients"=>$clients, "total_client"=>$total_client]);
};

$ajout = function(){
    if(isset($_POST['add-client'])){
        $errors = validDataClient($_POST);
        if(validate($errors)){
            ajoutClient($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['email'], $_POST['adresse']);
            redirectTo("client", "liste");
        }
        loadView("client/ajout", ["errors" => $errors, "old" => $_POST]);
        return;
    }
    loadView("client/ajout");
};

$detail = function(){
    echo "je detail un client";
};

$modifier = function(){
    if(isset($_GET['id'])){
        $id = (int) $_GET['id'];
        $client = getClientById($id);
        if(isset($_POST['update-client'])){
            $errors = validDataClient($_POST, $id);
            if(validate($errors)){
                updateClient($id, $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['email'], $_POST['adresse']);
                redirectTo("client", "liste");
            }
            $client = $_POST;
            loadView("client/ajout", ["client" => $client, "errors" => $errors]);
            return;
        }
        loadView("client/ajout", ["client"=>$client]);
    }
};

$supprimer = function(){
    if(isset($_GET['delete'])){
        deleteClient((int)$_GET['delete']);
        redirectTo("client", "liste");
    }
};

$actions = [
    "liste"     => $liste,
    "ajout"     => $ajout,
    "detail"    => $detail,
    "modifier"  => $modifier,
    "supprimer" => $supprimer
];

$action = $_REQUEST["action"] ?? "liste";

if(array_key_exists($action, $actions)){
    $actions[$action]();
} else {
    echo "page introuvable c client";
    exit();
}
