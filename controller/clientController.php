<?php
require_once __DIR__."/../model/clientModel.php";
echo "je suis dasn le model";
function newClient()
{
echo "je suis dasn la fonction d'ajout";
    if (isset($_POST['add-client'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
echo "avant ajout";

            ajoutClient($nom, $prenom, $telephone, $email, $adresse);
echo "aprés ajout";

            // return [$error, $success];
            header('Location: ajout.php');
        // }
    }
    require_once __DIR__ . '/../views/client/ajout.php';
}
