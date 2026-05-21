<?php
require_once ROOT."/config/config.php";

function listerClient(){
    $sql = "SELECT * FROM `client` ORDER BY id_client DESC";
    return executeSelect($sql);
}

function ajoutClient($nom, $prenom, $telephone, $email, $adresse){
    $sql = "INSERT INTO client(nom, prenom, telephone, email, adresse)
            VALUES (:nom, :prenom, :telephone, :email, :adresse)";
    $data = [
        'nom'       => $nom,
        'prenom'    => $prenom,
        'telephone' => $telephone,
        'email'     => $email,
        'adresse'   => $adresse
    ];
    return executeUpdate($sql, $data);
}

function deleteClient($id){
    // D'abord supprimer les commandes liées (cascade manuelle)
    $sqlCommande = "DELETE FROM commande WHERE id_client = :id";
    executeUpdate($sqlCommande, ['id' => $id]);
    
    // Puis supprimer le client
    $sqlClient = "DELETE FROM client WHERE id_client = :id";
    return executeUpdate($sqlClient, ['id' => $id]);
}

function updateClient($id, $nom, $prenom, $telephone, $email, $adresse){
    $sql = "UPDATE client 
            SET nom = :nom,
                prenom = :prenom,
                telephone = :telephone,
                email = :email,
                adresse = :adresse
            WHERE id_client = :id";
    $data = [
        'id'        => $id,
        'nom'       => $nom,
        'prenom'    => $prenom,
        'telephone' => $telephone,
        'email'     => $email,
        'adresse'   => $adresse
    ];
    return executeUpdate($sql, $data);
}

function getClientById($id){
    $sql = "SELECT * FROM client WHERE id_client = :id";
    $data = ['id' => $id];
    return executeSelect($sql, $data, true);
}

function clientHasCommandes(int $id): bool {
    $sql = "SELECT COUNT(*) as total FROM commande WHERE id_client = :id";
    $result = executeSelect($sql, ['id' => $id], true);
    return $result['total'] > 0;
}

function countClients(){
    $sql = "SELECT COUNT(*) as total FROM client";
    $result = executeSelect($sql, [], true);
    return $result['total'];
}
?>