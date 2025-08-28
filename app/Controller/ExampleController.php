<?php
namespace App\Controller;
use App\Model\ExampleModel;
use Exception;

class ExampleController
{
    private $model;

    public function __construct()
    {
        // Initialize the ExampleModel
        $this->model = new ExampleModel();
    }

    /**
     * Write a new record to the database
     *
     * @param array $data
     * @return void
     */
    public function writeRecord(array $data): void
    {
        try {
            $this->model->insertRecord($data);
        } catch (Exception $e) {
            // Log the error or handle it as needed
            error_log("Error writing record: " . $e->getMessage());
            throw new Exception("Failed to write record.");
        }
    }

    /**
     * Get all records from the database
     *
     * @return array
     */
    public function getAllRecords(): array
    {
        try {
            return $this->model->fetchAllRecords();
        } catch (Exception $e) {
            // Log the error or handle it as needed
            error_log("Error fetching records: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Delete a record by ID
     *
     * @param int $id
     * @return void
     */
    public function deleteRecord(int $id): void
    {
        try {
            $this->model->removeRecord($id);
        } catch (Exception $e) {
            // Log the error or handle it as needed
            error_log("Error deleting record: " . $e->getMessage());
            throw new Exception("Failed to delete record.");
        }
    }
}
