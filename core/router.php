<?php



class Router
{
    private $controller = 'app\Controllers\UserController';
    private $method = 'index';
    private $param = [];

    public function __construct()
    {
        $this->router();
    }

    public function router()
    {
        // var_dump($_REQUEST);
        if (empty($_SERVER['REQUEST_URI'])) {
            $uri = '';
        } else {
            $uri = $_SERVER['REQUEST_URI'];
        }

        $uri = explode('/', trim($uri, '/'));


            if (!empty($uri[0])) {
                $controller = 'app\Controllers\\' . $uri[0] . 'Controller';
                // var_dump($controller);
                // die();
                unset($uri[0]);
                if (class_exists($controller)) {
                    $this->controller = $controller;
                } else {
                    $controller = 'app\Controllers\ErrorController';
                    $this->controller = $controller;
                }
            }

            if (isset($uri[1])) {
                $method = $uri[1];
                unset($uri[1]);
                if (method_exists($this->controller, $method)) {
                    $this->method = $method;
                } else {
                    $controller = 'app\Controllers\ErrorController';
                    $this->controller = $controller;
                }
            }

        $object = new $this->controller;


        if (isset($uri[2])) {
            $param = array_values($uri);
            $this->param = $param;
        }

        call_user_func_array([$object, $this->method], $this->param);
    }
}
