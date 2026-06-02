<?php

function dd($test)
{
    echo "<pre>";
    var_dump($test);
    echo "</pre>";

    die("Yallah bakhna");
}

function loadView(string $view,array $datas=[],string $layout="base") {
    ob_start();
    extract($datas);
    require_once(ROOT."views/".$view.".php");
    $content=ob_get_clean();
    require_once ROOT."/views/layout/$layout.layout.php";
}

function path(string $controller, string $action): string{
    return WEBROOT."?controller=$controller&action=$action";
}

function redirectTo(string $controller, string $action):void{
    header('Location:'.WEBROOT."?controller=$controller&action=$action");
    exit();

}

function countTable(string $table){
    $sql="SELECT COUNT(*) as total FROM $table";
   return executeSelect($sql,[],true)["total"];
}

function isConnected(){
    return isset($_SESSION['user']);
}

function auth(){
    if (!isConnected()) {
        redirectTo("auth","login");
    }
}

function hasRole(string $role){
    return $_SESSION["user"]["role"]==$role;
}