<?php
    require_once __DIR__."/../config/config.php";
function listerProduit(){
    $pdo = getPDO();
    $sql = "SELECT * FROM `produit`";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
       
}
