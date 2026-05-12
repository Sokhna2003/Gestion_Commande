<?php

require_once __DIR__."/../model/produitModel.php";
function newProduit()
{
    if (isset($_POST['add-produit'])) {

        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        echo "jgjgjgj";
        
        
        ajoutProduit($libelle, $prix, $stock, $description);
        echo "enregistrer";
            // return [$error, $success];
            // die();
            header("Location:".WEBROOT."?page=listerProduit");
            exit();
        // }
    }

    require_once __DIR__ . '/../views/produit/ajout.php';
}
require_once __DIR__."/../model/produitModel.php";

