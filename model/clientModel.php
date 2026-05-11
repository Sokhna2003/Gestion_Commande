<?php

function listerClient(){
    $pdo = getPDO();
    $sql = "SELECT * FROM `client`";
    $stm = $pdo->query($pdo);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
       
}
