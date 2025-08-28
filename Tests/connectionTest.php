
<?php
use App\Config\Database;

require_once __DIR__ . '/../App/Config/Database.php'; // Adjusted to use a relative path

try {
    // Create an instance of the Database class
    $db = new class extends Database {};

    // Establish a connection using the linkDB method
    $pdo = $db->linkDB();

    // If the connection is successful
    echo "Connected successfully using PDO";
} catch (Exception $e) {
    // Handle connection error
    error_log($e->getMessage()); // Log the error message
    echo "An error occurred while connecting to the database. Please try again later.";
}
