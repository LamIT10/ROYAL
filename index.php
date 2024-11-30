<?php
session_start();

require 'bootstrap.php';

$role = $_GET['role'] ?? 'client';

$controllerCheckAuth = $_GET['controller'] ?? 'home';

authLogin($controllerCheckAuth);

$controllerName = ucfirst(strtolower($controllerCheckAuth)) . "Controller";

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
