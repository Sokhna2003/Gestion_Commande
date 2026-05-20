<?php
    require_once (ROOT."config/config.php");

function getAllCommandes(){
    $sql = "SELECT c.*, cl.nom, cl.prenom 
            FROM commande c
            JOIN client cl ON c.id_client = cl.id_client
            ORDER BY c.date_commande DESC";
    return executeSelect($sql);
}

function getCommandeById($id){
    $sql = "SELECT c.*, cl.nom, cl.prenom 
            FROM commande c
            JOIN client cl ON c.id_client = cl.id_client
            WHERE c.id_commande = :id";
    return executeSelect($sql, ["id"=>$id], true);
}

function getCommandesByClient($clientId){
    $sql = "SELECT * FROM commande WHERE id_client = :id ORDER BY date_commande DESC";
    return executeSelect($sql, ["id"=>$clientId]);
}

function countCommandes(){
    return countTable("commande");
}

function countCommandesByStatus($statut){
    $sql = "SELECT COUNT(*) as total FROM commande WHERE statut = :statut";
    return executeSelect($sql, ["statut"=>$statut], true)["total"];
}


// function addCommande($id_client, $date_commande, $montant_total, $statut, $description){
//     $sql = "INSERT INTO commande (id_client, date_commande, montant_total, statut, description) 
//             VALUES (:id_client, :date_commande, :montant_total, :statut, :description)";
//     return executeUpdate($sql, [
//         "id_client"=>$id_client,
//         "date_commande"=>$date_commande,
//         "montant_total"=>$montant_total,
//         "statut"=>$statut,
//         "description"=>$description
//     ]);
// }