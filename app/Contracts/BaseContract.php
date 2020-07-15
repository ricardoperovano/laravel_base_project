<?php

namespace App\Contracts;

/**
 * Interface BaseContract
 * @package App\Contracts
 */
interface BaseContract
{
    /**
     * Create a model instance
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a model instance
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(array $attributes, int $id);
    /**
     * Return list model rows
     * @param int $skip
     * @param int $take
     * @param array $columns
     * @param string $orderBy
     * @param string $orderDirection
     * @param array $relationship
     * @param array $filter
     * @param array $columns
     * @param string $search
     * @return mixed
     */
    public function list(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationship = [], array $filter = [], $columns = array('*'), $search = null, $join = null);
    /**
     * Find one by ID
     * @param int $id
     * @return mixed
     */
    public function find(int $id);
    /**
     * Find one by ID or throw exception
     * @param int $id
     * @return mixed
     */
    public function findOneOrFail(int $id);
    /**
     * Find based on a different column
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data);
    /**
     * Find one based on a different column
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data);
    /**
     * Find one based on a different column or through exception
     * @param array $data
     * @return mixed
     */
    public function findOneByOrFail(array $data);
    /**
     * Delete one by Id
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}
