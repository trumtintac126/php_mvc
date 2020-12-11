<?php

namespace App\Models;

/**
 * Class WorkModel
 *
 * @package App\Models
 */
class WorkModel extends AbstractModel
{
    /**
     * Add new record
     *
     * @param array $attributes Attributes
     *
     * @return bool
     * @throws \Exception
     */
    public function add($attributes)
    {
        return $this->insert($attributes, 'manage_works');
    }

    /**
     * Get all record table Product
     *
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return $this->index('manage_works');
    }

    /**
     * Update record with conditional
     *
     * @param integer    $id      Id
     *
     * @return bool
     */
    public function update($id, $attributes)
    {
        global $connection;

        try {
            $query = "UPDATE manage_works 
                        SET work_name = :workName, 
                        start_date = :startDate, 
                        end_date = :endDate, 
                        status = :status
                      WHERE id = :id";

            $stmt = $connection->prepare($query);
            $stmt->bindParam(':workName', $attributes['work_name']);
            $stmt->bindParam(':startDate', $attributes['start_date']);
            $stmt->bindParam(':endDate', $attributes['end_date']);
            $stmt->bindParam(':status', $attributes['status']);
            $stmt->bindParam(':id', $id);


            return $stmt->execute();
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            throw $exception;
        }

    }

    /**
     * Remove record with conditional
     *
     * @param int $id ID
     *
     * @return bool
     * @throws \Exception
     */
    public function removeById($id)
    {
        return $this->delete('manage_works', $id);
    }

    /**
     * FindById
     *
     * @param int $id ID
     *
     * @return array
     * @throws \Exception
     */
    public function show($id)
    {
        return $this->findById('manage_works', $id);
    }
}