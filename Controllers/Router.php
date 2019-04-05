<?php

class Router
{
    private $_controller;
    private $_view;

    public function routeReq()
    {
        try
        {
            // Automatic load model's class
            spl_autoload_register(function($className){
               include 'Models/' . $className . '.php';
            });

            $params = '';
            // If an url si define (Super Global) load correct controller
            // according to user action
            if(isset($_GET['url']))
            {
                $url = $_GET['url'];
                $params = explode('/', filter_var($url, FILTER_SANAiTIZE_URL));
                $controller = ucfirst(strlower($params[0]));
                $controllerClass= $controller . "Controller";
                $controllerFile = "Controllers/" . $controllerClass. "php";

                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    $this->_controller = new $controllerClass($params);
                }
                // No controller finded redirect to 404
                else
                    throw new Exception('Page introuvable');
            }
            // No url redirect to Home page mySite.com/Home
            else
            {
                require_once ('Controllers/HomeController.php');
                $this->_controller = new HomeController($params);
            }
        }
        catch (Exception $ex)
        {
            $errorMsg = $ex->getMessage();
            require_once('views/viewError.php');
        }
    }
}