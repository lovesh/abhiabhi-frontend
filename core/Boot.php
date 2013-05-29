<?php

include ('Registry.php');

Registry::$appPath = dirname(__DIR__);

include (Registry::$appPath.'/utils/Utils.php');
include ('Router.php');
include ('Model.php');

ini_set('date.timezone', Registry::$timezone);
$route=Router::getRoute();
Registry::$query = $_GET;
//var_dump($_SERVER['REQUEST_URI']);var_dump($route);var_dump(Registry::$query);die;
if (empty($route))
    header('Location: /NotFound.html');
//var_dump($route);
Registry::$destinationController=$route['controller'];
Registry::$destinationMethod=$route['method'];
if (array_key_exists('params', $route))
    Registry::$destinationArgs=$route['params'];

session_start();


