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
