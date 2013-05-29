<?php

include ('core/Boot.php');

$controller_name = Registry::$destinationController.'Controller';
$method_name = Registry::$destinationMethod;

include ($controller_name.'.php');

$controller = new $controller_name;

$controller->$method_name();



