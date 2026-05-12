<?php
    require_once __DIR__."/../config/config.php";
function listerProduit(){
    $pdo = getPDO();
    $sql = "SELECT * FROM `produit`";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
       
}

function ajoutProduit($libelle, $description, $prix, $stock)
{
    $pdo = getPDO();
    $sql = "INSERT INTO client(libelle, description, prix,stock)
            VALUES (:libelle, :description, :prix,:stock)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'libelle' => $libelle,
        'description' => $description,
        'prix' => $prix,
        'stock' => $stock,
    ]);
}

function deleteProduit($id)
{
    $pdo = getPDO();

    $sql = "DELETE FROM produit WHERE id_produit = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'id' => $id
    ]);
}


function updateProduit($id,$libelle, $description, $prix, $stock)
{
    $pdo = getPDO();

    $sql = "UPDATE produit 
            SET libelle = :libelle,
                description = :description,
                prix = :prix,
                stock = :stock,
            WHERE id_produit = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'id' => $id,
        'libelle' => $libelle,
        'description' => $description,
        'prix' => $prix,
        'stock' => $stock
    ]);
}

function getProduitById($id)
{
    $pdo = getPDO();

    $sql = "SELECT * FROM produit WHERE id_produit = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}






