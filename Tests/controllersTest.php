<?php

class ControllerTester
{
    public function testController($controllerPath, $methodName, $params = [])
    {
        if (!file_exists($controllerPath)) {
            return "Error: Controller file not found at path: $controllerPath";
        }

        require_once $controllerPath;

        // Extract the class name from the file path
        $className = basename($controllerPath, '.php');

        if (!class_exists($className)) {
            return "Error: Class $className not found in the controller file.";
        }

        $controller = new $className();

        if (!method_exists($controller, $methodName)) {
            return "Error: Method $methodName not found in class $className.";
        }

        // Call the method with parameters
        return call_user_func_array([$controller, $methodName], $params);
    }
}

// Example usage
$tester = new ControllerTester();
$controllerPath = '../App/Controller/ProjectController.php'; // Path to the controller file
$methodName = 'getAllRecords'; // Replace with the method you want to test
$params = []; // Replace with the parameters for the method

$result = $tester->testController($controllerPath, $methodName, $params);
echo '<pre>';
print_r($result);
echo '</pre>';