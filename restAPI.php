<?php 
    session_start();

    require_once __DIR__ . '/autoloader.php';    
   
    $endpoint = explode('/', trim($_SERVER['PATH_INFO'],'/'));
    $data = json_decode(file_get_contents('php://input'), true);

    $controllerName = $endpoint[0];
    $id = false;
    $alias = false;

    if (isset($endpoint[1])) {
        if (preg_match('/\b[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}\b/', $endpoint[1])) {
    $id = $endpoint[1];
        } else {
    $alias = $endpoint[1];
        }
    }
    
    $controllerClassName = 'App\\Controller\\'.ucfirst($controllerName). 'Controller';
    
    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
        $methodName = "delete" . ucfirst($controllerName);
    } else if ($_SERVER['REQUEST_METHOD'] == "PUT") {
        $methodName = "update" . ucfirst($controllerName);
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $methodName = "write" . ucfirst($controllerName);
    } else if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if ($alias) {
            $methodName = $alias;
        } else {
            $methodName = "get" . ucfirst($controllerName);
        } 
    }

    if (method_exists($controllerClassName, $methodName)) {
        $controller = new $controllerClassName();
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if ($id) {
                $controller->$methodName($id);
            } else {
                $controller->$methodName();
            }
        } else if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $controller->$methodName($data);
        } else if ($_SERVER['REQUEST_METHOD'] == "DELETE"){
            $controller->$methodName($id);    
        } else {
            $controller->$methodName($id, $data);
        }
    } else {
        //http_response_code(404);
        new \ppb\Library\Msg(true, 'Page not found: '.$controllerClassName.'::'.$methodName); 

    }
?>