<?php
require_once(ROOT."/config/config.php");

function login(string $email){
    $sql="SELECT * FROM utilisateur WHERE email like :email";
    return executeSelect($sql,["email"=>$email],true);
}



