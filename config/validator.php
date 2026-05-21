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

function emailExiste(string $email, int $excludeId = 0): bool {
    $pdo = getPDO();
    $sql = "SELECT COUNT(*) as total FROM client WHERE email = :email AND id_client != :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'id' => $excludeId]);
    return $stmt->fetch()['total'] > 0;
}

function telephoneExiste(string $telephone, int $excludeId = 0): bool {
    $pdo = getPDO();
    $sql = "SELECT COUNT(*) as total FROM client WHERE telephone = :telephone AND id_client != :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['telephone' => $telephone, 'id' => $excludeId]);
    return $stmt->fetch()['total'] > 0;
}

function validDataClient(array $data, int $excludeId = 0):array{
     $errors = [];
        if(empty($data["nom"])){
            $errors["nomVide"] ="Veuillez remplir le nom";
        }
        if(empty($data["prenom"])){
            $errors["prenomVide"] ="Veuillez remplir le prenom";
        }
        if(empty($data["telephone"])){
            $errors["telephoneVide"] ="Veuillez remplir le telephone";
        } elseif(telephoneExiste($data["telephone"], $excludeId)){
            $errors["telephoneDuplique"] ="Ce numéro de telephone est déjà utilisé";
        }
        if(empty($data["email"])){
            $errors["email"] ="Veuillez remplir l'email";
        } elseif(emailExiste($data["email"], $excludeId)){
            $errors["emailDuplique"] ="Cet email est déjà utilisé";
        }
        if(empty($data["adresse"])){
            $errors["adresse"] ="Veuillez remplir l'adresse";
        }
        return $errors;
}
