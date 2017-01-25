<?php
//FRONT CONTROLLER

//echo ' front controller <br>';
//echo 'your request: '.$_SERVER['REQUEST_URI'];//получаем строку запроса

//1.Общие настройки/Отображение ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

//2.Подключение файлов системы
define('ROOT',dirname(__FILE__));
require_once (ROOT.'/components/Autoload.php');
require_once (ROOT.'/components/Router.php');
require_once (ROOT.'/components/Db.php');

//echo '<pre>';
//print_r(ROOT);//путь к корневой папке проекта
//echo '</pre>';
//3.Установка соединения с базой данных

//4.Вызов Router
$router = new Router();
$router->run();
//5.