<?php

$routes = require_once basePath('routes.php');

if (array_key_exists($uri, $routes)) {
    require(basePath($routes[$uri]));
} else {
    http_response_code(404);
    require(basePath('controllers/error/404.php'));
}
