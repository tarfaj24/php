<?php 

namespace app\core;

class Router
{

    private array $routes = [];

    public function add($path, $controller, $method)
    {
        $this->routes[$path] = [
            "controller"=>$controller,
            "method"=>$method
        ];
    }

    public function resolve()
    {
        $requestUri = $_SERVER["REQUEST_URI"];
        $path = parse_url($requestUri, PHP_URL_PATH);

        $basePath = "/device_manager/public";

        $path = str_replace($basePath,"",$path);

        if (isset($this->routes[$path]))
        {
            $route = $this->routes[$path];
            $controller = $route["controller"];
            $method = $route["method"];
            $controller->$method();
        }
        else
        {
            http_response_code(404);
            echo "404 - Stránka ktorú hľadáte neexistuje!!!";
        }
    }
}

?>