<?php

require_once 'vendor/autoload.php';

$route = Router::createFromGlobal();

if (!file_exists("actions/{$route->name}.php")) {
    return http_response_code(404);
}

$response = require("actions/{$route->name}.php");

if (null == $route->extension) {
    require "templates/{$route->name}.handlebars";
} elseif ('json' == $route->extension && isset($response['json'])) {
    header('Content-Type: application/json');
    echo json_encode($response['json']);
} else {
    return http_response_code(404);
}