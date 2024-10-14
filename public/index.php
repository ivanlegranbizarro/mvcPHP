<?php

require_once '../helpers.php';
require_once basePath('Router.php');
require_once basePath('Database.php');

// Instantiate the router
$router = new Router();

// Register routes
$routes = require_once basePath('routes.php');

// Get the current URI and method
$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);
