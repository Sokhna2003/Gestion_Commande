<?php
    require_once __DIR__."/../config/config.php";
function listerClient(){
    $pdo = getPDO();
    $sql = "SELECT * FROM `client`";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
       
}
