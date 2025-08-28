<?php
namespace App\Model;

class ExampleModel
{
    private $records = [];

    public function __construct()
    {
        // Initialize with some example data
        $this->records = [
            ['id' => 1, 'name' => 'Example 1', 'value' => 100],
            ['id' => 2, 'name' => 'Example 2', 'value' => 200],
            ['id' => 3, 'name' => 'Example 3', 'value' => 300],
        ];
    }

    /**
     * Insert a new record into the example data
     *
     * @param array $data
     * @return void
     */
    public function insertRecord(array $data): void
    {
        $this->records[] = [
            'id' => count($this->records) + 1,
            'name' => $data['name'] ?? 'Unnamed',
            'value' => $data['value'] ?? 0,
        ];
    }

    /**
     * Fetch all records from the example data
     *
     * @return array
     */
    public function fetchAllRecords(): array
    {
        return $this->records;
    }

    /**
     * Remove a record by ID from the example data
     *
     * @param int $id
     * @return void
     */
    public function removeRecord(int $id): void
    {
        $this->records = array_filter($this->records, function ($record) use ($id) {
            return $record['id'] !== $id;
        });
    }
}
