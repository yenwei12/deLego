<?php
class Bootstrap
{
    public function __construct()
    {
        // Router
        $url = parse_url($_SERVER['REQUEST_URI']);
        $paths = explode('/', rtrim($url['path'], '/'));

        /*         echo '<pre>';
        print_r($url);
        print_r($paths);
        echo '</pre>'; */

        // Dispatcher
        if (isset($paths[1]) && !empty($paths[1])) {
            $controllerName = $paths[1] . 'Controller';
            $controllerFile = '../app/controller/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;

                $controller = new $controllerName;
                $controller->loadModel($paths[1]);


                if (isset($paths[2])) {
                    $actionName = $paths[2] . 'Action';

                    if (isset($paths[3])) {
                        $id = $paths[3];
                        $controller->{$actionName}($id);
                    } else {
                        if (method_exists($controller, $actionName)) {
                            $controller->{$actionName}();
                        } else {
                            // Default action
                            header('location: ../' . $controllerName);
                        }
                    }
                } else {
                    // Default action
                    $controller->indexAction();
                }
            } else {
                header('location: ../error');
            }
        } else {
            // Route to home page
            header('location: ../index');
        }
    }
}
