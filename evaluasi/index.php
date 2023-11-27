<?php

require_once "route.php";
require_once "controllers/ProductController.php";

// define routes here
$routes = [
  Route::get('/products', [ProductController::class, 'index']),
  Route::post('/products/add', [ProductController::class, 'store']),
  Route::post('/products/edit', [ProductController::class, 'update']),
];

// get url path
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$router = new Router($routes);
$router->handle($path);
