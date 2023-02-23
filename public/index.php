<?php
// Carga de parámetros
require_once '../app/Config/config.php';

// Autocarga de clases
require_once '../vendor/autoload.php';

// Utiliza las clases necesarias;
use App\Controllers\IndexController;
use App\Controllers\NumerosController;
use App\Core\Router;

$router = new Router();

// Rutas
$router->add(array(
  'name' => 'home',
  'path' => '/^\/index.php$/',
  'action' => [IndexController::class, 'IndexAction']
));

$router->add(array(
  'name' => 'saludo',
  'path' => '/\/saludo\/\w+$/',
  'action' => [IndexController::class, 'SaludoAction']
));

$router->add(array(
  'name' => 'numeros',
  'path' => '/\/numeros$/',
  'action' => [NumerosController::class, 'NumerosAction']
));

$router->add(array(
  'name' => 'numerosCantidad',
  'path' => '/\/numeros\/\d+/',
  'action' => [NumerosController::class, 'NumerosCantidadAction']
));

// Resolución de la ruta
$request = str_replace(DIRPUBLIC, '', $_SERVER['REQUEST_URI']);
$route = $router->match($request);
if ($route) {
  $controllerName = $route['action'][0];
  $actionName = $route['action'][1];
  $controller = new $controllerName;
  $controller->$actionName($request);
} else {
  echo "<p>No route</p>";
}
