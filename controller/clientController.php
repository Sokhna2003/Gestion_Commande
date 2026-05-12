<?php
require_once __DIR__."/../model/clientModel.php";

function newClient()
{
    if (isset($_POST['add-client'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];

        ajoutClient($nom, $prenom, $telephone, $email, $adresse);

        header('Location: ajout.php');
        exit();
    }

    require_once __DIR__ . '/../views/client/ajout.php';
}