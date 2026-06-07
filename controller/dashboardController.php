<?php
require_once ROOT."/model/dashboardModel.php";
auth();
$total_clients=countTable("client");
$total_commandes=countTable("commande");
$total_produits=countTable("produit");
$last3Commandes=get3LastCommandes();
loadView("dashboard/dashboard",
["total_clients"=>$total_clients,
"total_commandes"=>$total_commandes,
"total_produits"=>$total_produits,
"last3Commandes"=>$last3Commandes
]);