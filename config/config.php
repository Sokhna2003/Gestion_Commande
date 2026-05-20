<?php
function getPDO(){
    try{
        return new PDO(
            "mysql:host=127.0.0.1;dbname=group_commandes;charset=utf8;port=3306",
            "root",
            "",                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }catch(PDOException $e){
        die("Erreur PDO :" . $e->getMessage());
    }
}

function executeSelect(string $sql, array $data=[], $one=false) {
    $conn = getPDO();
    $statement = $conn->prepare($sql);
    count($data) == 0 ? $statement->execute() : $statement->execute($data);
    $result = $one == true ? $statement->fetch() : $statement->fetchAll();
    $conn = null;
    return $result;
}

function executeUpdate(string $sql, array $data) {
    $conn = getPDO();
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    $conn = null;
}