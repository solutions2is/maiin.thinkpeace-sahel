<?php
define('ROOT', dirname(__DIR__));
define('WEBROOT', $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/");
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'users.login';
}

$page = explode('.', $page);
if($page[0] == 'admin'){
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else{
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}

$controller = new $controller();
$controller->$action();