<?php
require_once __DIR__ . '/../app/Config/database.php';
require_once __DIR__ . '/../app\Controllers\ProjectController.php';

$db = (new Database())->getConnection();
$controller = new ProjectController($db);

header("Content-Type: application/json");
echo json_encode($controller->getAllProjects());
