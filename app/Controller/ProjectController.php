<?php

namespace App\Controller;

use App\Model\ProjectModel;

class ProjectController {
    
    public function __construct()
    {
        
    }

    // Method to get all projects
    // This method is called by the router
    // and is used to get all projects from the database
    // and return them as JSON

    public function getProject(): void 
    {
        echo "This is the Table Project";
        echo "<br>";
        $model = new ProjectModel();
        $data = $model->readProject();

        echo "<br>";

        // Check if data is not empty before displaying table
        if (empty($data)) {
            echo "No projects found.";
            return;
        }
        
        // Display the data in a table format
        echo '<table border="1" cellpadding="5" cellspacing="0">';
        // Table header
        echo '<tr>';
        foreach (array_keys($data[0]) as $header) {
            echo '<th>' . htmlspecialchars($header) . '</th>';
        }
        echo '</tr>';
        // Table rows
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $cell) {
                echo '<td>' . htmlspecialchars($cell) . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
