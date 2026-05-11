<?php
function getPDO(){
    try{
        return new PDO(
            "mysql:host=127.0.0.1;
            dbname=group_commandes;
            charset=utf8;
            port=3306",
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
