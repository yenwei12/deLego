<?php

class Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($className)
    {
        $modelName = $className . 'Model';
        $path = '../app/model/' . $modelName . '.php';

        if (file_exists($path)) {
            require $path;
            $this->model = new $modelName();
        }
    }
}
