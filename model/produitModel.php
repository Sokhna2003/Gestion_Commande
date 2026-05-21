<?php
    require_once __DIR__."/../config/config.php";
function listerProduit(){
    $sql = "SELECT * FROM `produit`";
    return executeSelect($sql);
       
}

function ajoutProduit($reference, $libelle, $description, $prix, $stock)
{
    // $pdo = getPDO();
    $sql = "INSERT INTO produit(reference, libelle, description, prix,stock)
            VALUES (:reference,:libelle,:description,:prix,:stock)";
    // $stmt = $pdo->prepare($sql);
    // On regroupe les données dans un tableau pour correspondre aux paramètres
    $data = [
        'reference' => $reference,
        'libelle' => $libelle,
        'description' => $description,
        'prix' => $prix,
        'stock' => $stock,
    ];
    return executeUpdate($sql, $data);
}

function deleteProduit($id)
{
    // $pdo = getPDO();

    $sql = "DELETE FROM produit WHERE id_produit = :id";

    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([
    //     'id' => $id
    // ]);
    $data = [
        'id' => $id
    ];
    return executeUpdate($sql, $data);

}


function updateProduit($id, $reference, $libelle, $description, $prix, $stock)
{
    // $pdo = getPDO();

    $sql = "UPDATE produit 
            SET reference   = :reference, 
                libelle = :libelle,
                description = :description,
                prix = :prix,
                stock = :stock
            WHERE id_produit = :id";

    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([
    //     'id' => $id,
    //     'libelle' => $libelle,
    //     'description' => $description,
    //     'prix' => $prix,
    //     'stock' => $stock
    // ]);
    $data = [
        'id' => $id,
        'reference' => $reference,
        'libelle' => $libelle,
        'description' => $description,
        'prix' => $prix,
        'stock' => $stock,
    ];
    return executeUpdate($sql, $data);


}

function getProduitById($id)
{
    // $pdo = getPDO();

    $sql = "SELECT * FROM produit WHERE id_produit = :id";

    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([
    //     'id' => $id
    // ]);
    $data = [
        'id' => $id
    ];
    return executeSelect($sql, $data, true);
    // return $stmt->fetch(PDO::FETCH_ASSOC);
}






