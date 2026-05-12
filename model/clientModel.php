<?php
    require_once __DIR__."/../config/config.php";
function listerClient(){
    $pdo = getPDO();
    $sql = "SELECT * FROM `client`";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
       
}


function ajoutClient($nom, $prenom, $telephone, $email, $adresse)
{
    $pdo = getPDO();
    $sql = "INSERT INTO client(nom,prenom,telephone,email,adresse)
            VALUES (:nom,:prenom,:telephone,:email,:adresse)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'telephone' => $telephone,
        'email' => $email,
        'adresse' => $adresse
    ]);
}

function deleteClient($id)
{
    $pdo = getPDO();

    $sql = "DELETE FROM client WHERE id_client = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'id' => $id
    ]);
}


function updateClient($id, $nom, $prenom, $telephone, $email, $adresse)
{
    $pdo = getPDO();

    $sql = "UPDATE client 
            SET nom = :nom,
                prenom = :prenom,
                telephone = :telephone,
                email = :email,
                adresse = :adresse
            WHERE id_client = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'id' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
        'telephone' => $telephone,
        'email' => $email,
        'adresse' => $adresse
    ]);
}

function getClientById($id)
{
    $pdo = getPDO();

    $sql = "SELECT * FROM client WHERE id_client = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}