<?php

require_once '../helpers.php';
require_once basePath('Router.php');
require_once basePath('Database.php');

// Instantiate the router
$router = new Router();

// Register routes
$routes = require_once basePath('routes.php');

// Get the current URI and method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);
