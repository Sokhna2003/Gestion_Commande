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
function validDataProduit(array $data):array{
     $errors = [];
        if(empty($data["reference"])){
            $errors["referenceVide"] ="Veuillez remplir la reference";
        }
        if(empty($data["libelle"])){
            $errors["libelleVide"] ="Veuillez remplir le libelle";
        }
        if(empty($data["description"])){
                $errors["descriptionVide"] ="Veuillez remplir le description";
            }
        if(empty($data["prix"])){
            $errors["prixVide"] ="Veuillez remplir le prix";
            }
        if(empty($data["stock"])){
                $errors["stockVide"] ="Veuillez remplir le stock";
            }
        return $errors;
}