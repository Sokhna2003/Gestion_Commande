<?php

require_once __DIR__."/../model/produitModel.php";
function newProduit()
{
    if (isset($_POST['add-produit'])) {

        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];

                 ajoutProduit($libelle, $prix, $stock, $description);
            // return [$error, $success];
            header("Location:".WEBROOT."?page=lister");
            exit();
        // }
    }

    require_once __DIR__ . '/../views/produit/ajout.php';
}
