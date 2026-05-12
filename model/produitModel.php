<?php
    require_once __DIR__."/../config/config.php";
function listerProduit(){
    $pdo = getPDO();
    $sql = "SELECT * FROM `produit`";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
       
}

function ajoutProduit($libelle, $prix, $stock, $description)
{
    $pdo = getPDO();
    $sql = "INSERT INTO produit(libelle,prix,stock,description)
            VALUES (:libelle,:prix,:stock,:description)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'libelle' => $libelle,
        'prix' => $prix,
        'stock' => $stock,
        'description' => $description,
       
    ]);
}




