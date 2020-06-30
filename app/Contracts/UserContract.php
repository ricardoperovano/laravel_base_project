<?php

namespace App\Contracts;

/**
 * Interface UserContract
 * @package App\Contracts
 */
interface UserContract{

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
	public function listUser(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationships = [], array $filter = [], $columns = array('*'), $search = null);

	/**
	 * @param int $id
	 * @param array $relationships
	 * @return User|mixed
	 */
	public function findUserById(int $id, array $relationships = []);

	/**
	 * @param array $params
	 * @return User|mixed
	 */
	public function createUser(array $params);

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateUser(array $params);

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function deleteUser($id);

}