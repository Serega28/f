<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getUri()//Проверить строку запроса
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function run()//отвечает за анализ запроса и передачу управления
    {
        $uri = $this->getUri();
        //echo $uri;
        //Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // echo "<br>$uriPattern->$path";

            //Сравниваем uriPattern & uri
            if (preg_match("~$uriPattern~", $uri)) {
                //Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);
                //Если есть совпадения - определить какой контороллер и action обрабатівают запрос
                //echo $path;
                $segments = explode('/', $internalRoute);

//                echo '<pre>';
//                print_r($segments);
//                echo '</pre>';
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));
//                echo $controllerName;
//                echo "<br>$actionName";
                $parameters = $segments;
                //echo '<br> controller name :'.$controllerName;
                //echo '<br>action name :'.$actionName;
                //echo '<pre>';
                //print_r($parameters);

               //die;

                //Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                include_once($controllerFile);
                }
                //Создать обьект,вызвать метод(т.е. action)
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);

                if ($result != null) {
                break;}
                //print_r($this->routes);
            }

        }

    }
    //print_r($this->routes);
      //echo 'Class Router,method Run';

}