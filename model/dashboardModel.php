<?php
require_once(ROOT."/config/config.php");

function get3LastCommandes(){
    $sql="SELECT cd.*, CONCAT(c.prenom,' ',c.nom) as nom_complet FROM commande cd JOIN client c ON cd.id_client=c.id_client ORDER BY cd.date_commande DESC LIMIT 3";
    return executeSelect($sql);
}