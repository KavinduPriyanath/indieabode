<?php

class View
{


    function __construct()
    {
    }

    public function render($viewName)
    {
        require 'views/' . $viewName . '.php';
    }

    public function load($viewName, $data = []) {
        $filePath = 'views/' . $viewName . '.php';
        if (file_exists($filePath)) {
            extract($data);
            require_once($filePath);
        } else {
            die('View file not found: ' . $viewName.'filepath'.$filePath);
        }
    }
}
