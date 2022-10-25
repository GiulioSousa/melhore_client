<?php

require __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['PATH_INFO'] ?? '/';
$routes = require __DIR__ . '/../config/routes.php';

if ($path === '/') {
    header('location: /login');
}

/* if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    exit();
} */

/* if (!isset($routes[$path])) {
    http_response_code(404);
    echo "Check!";
    exit();
} */

session_start();

$loginRoute = str_contains($path, 'login');
echo "Check2!";

if (!isset($_SESSION['logged']) && !$loginRoute) {
    header('location: /login');
    exit();
}

$controllerClass = $routes[$path];
/** @var InterfaceHandler $controller */
$controller = new $controllerClass;
$controller->handler();
