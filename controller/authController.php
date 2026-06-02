<?php
require_once ROOT."/model/authModel.php";

$logout = function(){
    session_unset();    // Vide les données de session (ex: $_SESSION['user'])
    session_destroy();  // Détruit la session sur le serveur
    redirectTo("auth","login");

};

$login = function(){
    if(isConnected()){
        redirectTo("dashboard","index");
    }
    
   $errors=[];
    if (isset($_POST["connect"])) {
        isEmpty("emailVide",$_POST["email"],$errors,"Veuillez renseigner l'email");
        isEmpty("passwordVide",$_POST["password"],$errors,"Veuillez renseigner le password");
        
        if (validate($errors)) {
            $user=login($_POST["email"]);
            // dd($user);
            if ($user && $_POST["password"] == $user["mdp"]) {
                $_SESSION["user"]=$user;
                redirectTo("dashboard","index");
            }else{
                $errors["global"]="email ou mot de passe incorrect";
            }
        }
    }
loadView("auth/login",["errors"=>$errors],"auth");
};


$actions=[
    "login"=>$login,
    "logout"=>$logout, 
];
 $action=$_REQUEST["action"]??"login";
 
 if (array_key_exists($action, $actions)) {
         $actions[$action]();
     }
     else{
         echo "page introuvable c client";
         exit();
}
         
