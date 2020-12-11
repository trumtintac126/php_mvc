<?php

namespace App\Models;

use PDO;

/**
 * Class AbstractModel
 *
 * @package App\Models
 */
class AbstractModel
{
    /**
     * Insert new record in table
     *
     * @param array  $attributes Attributes params
     * @param string $table      TableName
     *
     * @return bool
     * @throws \Exception
     */
    public function insert(array $attributes, $table)
    {
        global $connection;

        try {
            $fields = array_keys($attributes);
            $sql    = "INSERT INTO " . $table . " (" . implode(',', $fields) . ") VALUES('" . implode("','", $attributes) . "')";
            $stmt   = $connection->prepare($sql);
            return $stmt->execute();

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Get data
     *
     * @param string   $table  TableName
     * @param array    $where  Conditional
     * @param string[] $fields Field select
     *
     * @return array
     * @throws \Exception
     */
    public function index($table, $where = [], $fields = '*')
    {
        global $connection;

        try {
            $query = "SELECT {$fields} FROM {$table}";

            if (!empty($where)) {
                $query = "SELECT {$fields} FROM {$table} WHERE {$where}";
            }

            $stmt = $connection->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Remove record with conditional
     *
     * @param string $table TableName
     * @param int    $id    Id
     *
     * @return bool
     * @throws \Exception
     */
    public function delete($table, $id)
    {
        global $connection;

        try {
            $query = "DELETE FROM {$table} WHERE id = :id";
            $stmt  = $connection->prepare($query);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Find record by Id
     *
     * @param string $table TableName
     * @param int    $id    Id
     * @param string $fileds Columns
     *
     * @return mixed
     * @throws \Exception
     */
    public function findById($table, $id, $fileds = '*')
    {
        global $connection;

        try {
            $query = "SELECT {$fileds} FROM {$table} WHERE id = :id AND delete_at IS NULL";
            $stmt =  $connection->prepare($query);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

}