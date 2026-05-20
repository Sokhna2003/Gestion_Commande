<?php
//verifier champs vides
function isEmpty($key,$value,array &$errors,string $msg="Ce champs est obligatoire"){
     if (empty(trim($value))) {
        $errors[$key]=$msg;
     }
}

function isNumeric($value){
    return is_numeric($value);
}

function isString($value){
    return is_string($value);
}


function isMail($value){
    return filter_var($value, FILTER_VALIDATE_EMAIL);
}   

function validate(array $errors):bool{
    return count($errors)==0;
}