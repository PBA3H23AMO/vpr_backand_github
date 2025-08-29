<?php

// Include the autoloader
require_once __DIR__ . '/../autoloader.php';

use App\Controller\ProjectController;

class ControllerTester
{
    public function testController($controllerClass, $methodName, $params = [])
    {
        if (!class_exists($controllerClass)) {
            return "Error: Class $controllerClass not found.";
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $methodName)) {
            return "Error: Method $methodName not found in class $controllerClass.";
        }

        // Call the method with parameters
        return call_user_func_array([$controller, $methodName], $params);
    }
}

// Example usage
$tester = new ControllerTester();
$controllerClass = 'App\Controller\ProjectController'; // Use fully qualified class name
$methodName = 'getProject'; // Replace with the method you want to test
$params = []; // Replace with the parameters for the method

$result = $tester->testController($controllerClass, $methodName, $params);
echo '<pre>';
print_r($result);
echo '</pre>';