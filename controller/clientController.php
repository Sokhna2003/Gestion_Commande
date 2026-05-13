<?php
require_once __DIR__."/../model/clientModel.php";

$actions = [
    "lister" => "listerClient"
];

$action = $_REQUEST['action'] ?? 'listerClient';

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

function newClient()
{
    if (isset($_POST['add-client'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
            ajoutClient($nom, $prenom, $telephone, $email, $adresse);
            header("Location:".WEBROOT."?page=lister");
            exit();
    }

    require_once __DIR__ . '/../views/client/ajout.php';
}

function supprimerCLient(){
    if(isset($_GET['delete'])){
        $id = intval($_GET['delete']);
        deleteClient($id);
        header("Location:".WEBROOT."?page=lister");
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

            header("Location:".WEBROOT."?page=lister");
            exit();
        }

        require_once __DIR__."/../views/client/ajout.php";
    }
}