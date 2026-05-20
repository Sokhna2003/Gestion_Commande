<?php
require_once(ROOT."/config/config.php");

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

function getClientByTelephone($telephone){
    $sql = "SELECT * FROM client WHERE telephone = :telephone";
    return executeSelect($sql, ["telephone"=>$telephone], true);
}

function getProduitByReference($reference){
    $sql = "SELECT * FROM produit WHERE reference = :reference";
    return executeSelect($sql, ["reference"=>$reference], true);
}

function addCommande($id_client, $montant_total, $description, array $panier){
    $pdo = getPDO();

    // 1. Insérer la commande
    $sql = "INSERT INTO commande (id_client, date_commande, montant_total, statut, description) 
            VALUES (:id_client, CURDATE(), :montant_total, 'NONSOLDE', :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "id_client"     => $id_client,
        "montant_total" => $montant_total,
        "description"   => $description
    ]);

    $id_commande = $pdo->lastInsertId();

    // 2. Insérer chaque ligne + décrémenter le stock
    foreach($panier as $item){
        $sqlLigne = "INSERT INTO produit_commande (id_commande, id_produit, quantite, prix_vente) 
                     VALUES (:id_commande, :id_produit, :quantite, :prix_vente)";
        $stmt = $pdo->prepare($sqlLigne);
        $stmt->execute([
            "id_commande" => $id_commande,
            "id_produit"  => $item["id_produit"],
            "quantite"    => $item["quantite"],
            "prix_vente"  => $item["prix"]
        ]);

        $sqlStock = "UPDATE produit SET stock = stock - :quantite WHERE id_produit = :id_produit";
        $stmt = $pdo->prepare($sqlStock);
        $stmt->execute([
            "quantite"   => $item["quantite"],
            "id_produit" => $item["id_produit"]
        ]);
    }
}