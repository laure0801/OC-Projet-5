<?php

// Autoloader de Composer (si vous utilisez Composer)
require_once 'vendor/autoload.php';

// Configuration des routes
$routes = [
    '/' => 'App\Controller\HomeController@displayHome',
    // Ajoutez d'autres routes au besoin
];

// Gestion du routage
$requestedUrl = $_SERVER['REQUEST_URI'];

if (isset($routes[$requestedUrl])) {
    list($controllerAction, $methodName) = explode('@', $routes[$requestedUrl]);
    list($controllerNamespace, $controllerName) = explode('\\', $controllerAction);

    // Inclusion du contrôleur
    require_once 'App/Controller/' . $controllerName . '.php';

    // Instanciation du contrôleur et appel de la méthode
    $controller = new $controllerNamespace();
    $controller->$methodName();
} else {
    // Gérer la page 404 ou autre comportement par défaut
    echo 'Page not found';
}
