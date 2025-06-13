<?php
require_once __DIR__ . '/../Models/Project.php';

class ProjectController {
    private $project;

    public function __construct($db) {
        $this->project = new Project($db);
    }

    public function getAllProjects() {
        return $this->project->fetchAll();
    }
}
