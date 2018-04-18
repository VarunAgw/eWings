<?php

class Router {

    public static function createFromGlobal() {
        $request = parse_url($_SERVER['REQUEST_URI'])['path'];
        $request = pathinfo($request);

        $route = new stdClass();
        $route->name = str_replace('\\', '/', $request['dirname']) . $request['filename'];
        $route->extension = isset($request['extension']) ? $request['extension'] : null;

        if ('/' == ($route->name)) {
            $route->name = 'main';
        }
        return $route;
    }

}
