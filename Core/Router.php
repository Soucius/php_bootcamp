<?php

    namespace Core;
    class Router {
        protected $routes = [];

        public function get($uri, $controller) {
            $this->routes[] = [
                'uri' => $uri,
                'controller' => $controller,
                'method' => 'get'
            ];
        }

        public function post($uri, $controller) {
            $this->routes[] = [
                'uri' => $uri,
                'controller' => $controller,
                'method' => 'post'
            ];
        }

        public function delete($uri, $controller) {
            $this->routes[] = [
                'uri' => $uri,
                'controller' => $controller,
                'method' => 'delete'
            ];
        }

        public function patch($uri, $controller) {
            $this->routes[] = [
                'uri' => $uri,
                'controller' => $controller,
                'method' => 'patch'
            ];
        }

        public function put($uri, $controller) {
            $this->routes[] = [
                'uri' => $uri,
                'controller' => $controller,
                'method' => 'put'
            ];
        }

        public function route($uri, $method) {
            foreach ($this->routes as $route) {
                if ($route['uri'] === $uri) {
                    return require base_path($route['controller']);
                }
            }

            $this->abort();
        }

        protected function abort($code = 404) {
            http_response_code($code);

            require base_path("views/{$code}.php");

            die();
        }
    }

    // function routeToController($uri, $routes) {
    //     if (array_key_exists($uri, $routes)) {
    //         require base_path($routes[$uri]);
    //     } else {
    //         abort();
    //     }
    // }