<?php

namespace App\Contracts;

/**
 * Interface LogContract
 * @package App\Contracts
 */
interface LogContract{

	/**
	 * @param int $skip
	 * @param int $take
	 * @param string $orderBy
	 * @param string $orderDirection
	 * @param array $relationships
	 * @param array $filter
	 * @param array $columns
	 * @param string $search
	 * @return mixed
	 */
	public function listLog(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationships = [], array $filter = [], $columns = array('*'), $search = null);

	/**
	 * @param int $id
	 * @param array $relationships
	 * @return Log|mixed
	 */
	public function findLogById(int $id, array $relationships = []);

	/**
	 * @param array $params
	 * @return Log|mixed
	 */
	public function createLog(array $params);

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateLog(array $params);

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function deleteLog($id);

}