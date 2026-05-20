<?php

function dd($test)
{
    echo "<pre>";
    var_dump($test);
    echo "</pre>";

    die("Yallah bakhna");
}

function loadView(string $view, array $datas=[]){
    extract($datas);
    require_once (ROOT."view/".$view.".php");
}

function path(string $controller, string $action): string{
    return WEBROOT."?controller=$controller&action=$action";
}
