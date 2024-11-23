<?php
session_start();
// var_dump($_SESSION['user']);
require 'bootstrap.php';

$role = $_GET['role'] ?? 'client';

$controllerName = ucfirst(strtolower($_GET['controller'] ?? 'home')) . "Controller";

$controllerPath = "controllers/$role/$controllerName.php";

$action = $_GET['action'] ?? 'index';

if (file_exists("$controllerPath")) {
    require "$controllerPath";
    $controllerObject = new $controllerName();
    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        $controllerObject->index();
    }
}
