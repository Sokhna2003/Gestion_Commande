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
        // $error = [];
        // Validation
        // if (empty($nom)) $error['nom'] = 'Champ obligatoire';
        // if (empty($pre)) $error['pre'] = 'Champ obligatoire';
        // if (empty($cls)) $error['cls'] = 'Champ obligatoire';
        // if (empty($tel)) $error['tel'] = 'Champ obligatoire';
        // if (empty($ads)) $error['ads'] = 'Champ obligatoire';
        // if (empty($mail)) {
        //     $error['mail'] = 'Champ obligatoire';
        // } else if (!is_email($mail)) {
        //     $error['mail'] = 'Mail invalide';
        // }
        // Vérification des doublons
        // $user_mail = verifUniqueUniversel($mail, 'email', 'etudiant');
        // if ($user_mail) {
        //     $error['mail'] = 'Utilisateur déjà enregistré';
        // }
        // $user_tel = verifUniqueUniversel($tel, 'telephone', 'etudiant');
        // if ($user_tel) {
        //     $error['tel'] = 'Numéro déjà occupé';
        // }
        // Transformation de la classe
        // $id_classe = getIdClasseByLibelle($cls);
        // if (!$id_classe) {
        //     $error['cls'] = 'Classe invalide';
        // }
        // if (empty($error)) {
            ajoutClient($nom, $prenom, $telephone, $email, $adresse);
            // return [$error, $success];
            header("Location:".WEBROOT."?page=lister");
            exit();
        // }
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

        require_once __DIR__."/../views/client/update.php";
    }
}