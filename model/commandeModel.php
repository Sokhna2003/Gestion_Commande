<?php
    require_once __DIR__."/../config/config.php";
function listerCommande(){
    $pdo = getPDO();
    $sql = "SELECT * FROM `commande`";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
       
}
