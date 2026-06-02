<?php
// session_start();
require_once ROOT."/model/commandeModel.php";

if(!isset($_SESSION["commande"])){
    $_SESSION["commande"] = [
        "client"  => null,
        "produit" => null,
        "panier"  => []
    ];
}

$liste = function(){
    $commandes = getAllCommandes();
    $total_commandes = countTable("commande");
    loadView("commande/liste", [
        "commandes"        => $commandes,
        "total_commandes"  => $total_commandes
    ]);
};

$ajout = function(){
    $client       = $_SESSION["commande"]["client"];
    $produit      = $_SESSION["commande"]["produit"];
    $panier       = $_SESSION["commande"]["panier"];
    $erreur_client  = $_SESSION["erreur_client"] ?? null;
    $erreur_produit = $_SESSION["erreur_produit"] ?? null;
    $erreur_qte     = $_SESSION["erreur_qte"] ?? null;

    // Nettoyer les erreurs après lecture
    unset($_SESSION["erreur_client"], $_SESSION["erreur_produit"], $_SESSION["erreur_qte"]);

    // Calcul total panier
    $total = 0;
    foreach($panier as $item){
        $total += $item["prix"] * $item["quantite"];
    }

    loadView("commande/ajout", [
        "client"          => $client,
        "produit"         => $produit,
        "panier"          => $panier,
        "total"           => $total,
        "erreur_client"   => $erreur_client,
        "erreur_produit"  => $erreur_produit,
        "erreur_qte"      => $erreur_qte
    ]);
};

$rechercherClient = function(){
    $tel = trim($_POST["tel_client"] ?? "");

    if($tel === ""){
        $_SESSION["erreur_client"] = "Veuillez entrer un numéro de téléphone.";
    } elseif(!preg_match('/^\d+$/', $tel)){
        $_SESSION["erreur_client"] = "Le numéro ne doit contenir que des chiffres.";
    } elseif(strlen($tel) < 9 || strlen($tel) > 15){
        $_SESSION["erreur_client"] = "Le numéro doit contenir entre 9 et 15 chiffres.";
    } else {
        $client = getClientByTelephone($tel);
        if($client){
            $_SESSION["commande"]["client"]  = $client;
            $_SESSION["commande"]["produit"] = null;
            $_SESSION["commande"]["panier"]  = [];
        } else {
            $_SESSION["commande"]["client"]  = null;
            $_SESSION["erreur_client"] = "Aucun client trouvé avec ce numéro.";
        }
    }

    redirectTo("commande", "ajout");
};

$rechercherProduit = function(){
    $ref = trim($_POST["ref_produit"] ?? "");

    if($ref === ""){
        $_SESSION["erreur_produit"] = "Veuillez entrer une référence produit.";
    } elseif(!preg_match('/^[a-zA-Z0-9\-]+$/', $ref)){
        $_SESSION["erreur_produit"] = "La référence ne doit contenir que des lettres, chiffres et tirets.";
    } else {
        $produit = getProduitByReference($ref);
        if($produit){
            $_SESSION["commande"]["produit"] = $produit;
        } else {
            $_SESSION["commande"]["produit"] = null;
            $_SESSION["erreur_produit"] = "Aucun produit trouvé avec cette référence.";
        }
    }

    redirectTo("commande", "ajout");
};

$ajouterAuPanier = function(){
    $produit = $_SESSION["commande"]["produit"];
    $qteStr  = trim($_POST["qte_commande"] ?? "");

    if(!$produit){
        $_SESSION["erreur_qte"] = "Aucun produit sélectionné.";
        redirectTo("commande", "ajout");
        return;
    }

    if($qteStr === ""){
        $_SESSION["erreur_qte"] = "Veuillez entrer une quantité.";
    } elseif(!preg_match('/^\d+$/', $qteStr)){
        $_SESSION["erreur_qte"] = "La quantité doit être un nombre entier positif.";
    } else {
        $qte = (int)$qteStr;

        if($qte <= 0){
            $_SESSION["erreur_qte"] = "La quantité doit être supérieure à 0.";
        } else {
            // Quantité déjà dans le panier pour ce produit
            $qteDejaAuPanier = 0;
            foreach($_SESSION["commande"]["panier"] as $item){
                if($item["id_produit"] == $produit["id_produit"]){
                    $qteDejaAuPanier = $item["quantite"];
                    break;
                }
            }

            $stockRestant = $produit["stock"] - $qteDejaAuPanier;

            if($qte > $stockRestant){
                $_SESSION["erreur_qte"] = "Stock insuffisant. Il reste $stockRestant unité(s) disponible(s).";
            } else {
                // Chercher si déjà dans le panier
                $trouve = false;
                foreach($_SESSION["commande"]["panier"] as &$item){
                    if($item["id_produit"] == $produit["id_produit"]){
                        $item["quantite"] += $qte;
                        $trouve = true;
                        break;
                    }
                }
                unset($item);

                if(!$trouve){
                    $_SESSION["commande"]["panier"][] = [
                        "id_produit" => $produit["id_produit"],
                        "reference"  => $produit["reference"],
                        "libelle"    => $produit["libelle"],
                        "prix"       => (float)$produit["prix"],
                        "quantite"   => $qte,
                        "stock"      => $produit["stock"]
                    ];
                }

                // Réinitialiser le produit sélectionné
                $_SESSION["commande"]["produit"] = null;
            }
        }
    }

    redirectTo("commande", "ajout");
};

$retirerDuPanier = function(){
    $index = $_POST["index"] ?? null;

    if($index !== null && isset($_SESSION["commande"]["panier"][$index])){
        array_splice($_SESSION["commande"]["panier"], (int)$index, 1);
    }

    redirectTo("commande", "ajout");
};

$enregistrer = function(){
    $client  = $_SESSION["commande"]["client"];
    $panier  = $_SESSION["commande"]["panier"];
    $description = trim($_POST["description"] ?? "");

    if(!$client || count($panier) === 0){
        redirectTo("commande", "ajout");
        return;
    }

    $montant_total = 0;
    foreach($panier as $item){
        $montant_total += $item["prix"] * $item["quantite"];
    }

    addCommande($client["id_client"], $montant_total, $description ?: null, $panier);

    // Vider la session commande
    $_SESSION["commande"] = [
        "client"  => null,
        "produit" => null,
        "panier"  => []
    ];

    redirectTo("commande", "liste");
};

$actions = [
    "liste"            => $liste,
    "ajout"            => $ajout,
    "rechercherClient" => $rechercherClient,
    "rechercherProduit"=> $rechercherProduit,
    "ajouterAuPanier"  => $ajouterAuPanier,
    "retirerDuPanier"  => $retirerDuPanier,
    "enregistrer"      => $enregistrer,
    "modifier"         => $modifier ?? function(){ echo "Je modifie une commande"; },
    "supprimer"        => $supprimer ?? function(){ echo "Je supprime une commande"; }
];

$action = $_REQUEST["action"] ?? "liste";

if(array_key_exists($action, $actions)){
    $actions[$action]();
} else {
    echo "Page introuvable commande";
    exit();
}
?>