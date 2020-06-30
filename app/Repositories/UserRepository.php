<?php

namespace App\Repositories;

use App\Models\User;
use App\Contracts\UserContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class UserRepository
 *
 * @package \App\Repositories
 */
class UserRepository extends BaseRepository implements UserContract {

	/**
	 * UserRepository constructor.
	 * @param User $model
	 */
	public function __construct(User $model)
	{
		parent::__construct($model);
		$this->model = $model;
	}

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
	public function listUser(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationships = [], array $filter = [], $columns = array('*'), $search = null)
	{
		$searchFields = [];
		if ($search) {
			$searchFields = [
				"nome"	=> $search,
				"id"	=> $search,
			];
		}

		return $this->list($skip, $take, $orderBy, $orderDirection, $relationships, $filter, $columns, $searchFields);
	}

	/**
	 * @param int $id
	 * @param array $relationships
	 * @return User|mixed
	 */
	public function findUserById(int $id, array $relationships = [])
	{
		try {
			return $this->findOneOrFail($id, $relationships);
		} catch (ModelNotFoundException $e){
			throw new ModelNotFoundException($e);
		}
	}

	/**
	 * @param array $params
	 * @return User|mixed
	 */
	public function createUser(array $params)
	{
		try {
			return User::create($params);
		} catch (QueryException $e){
			throw new InvalidArgumentException($e->getMessage());
		}
	}

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateUser(array $params)
	{
		return $this->findUserById($params['id'])->update($params);
	}

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function deleteUser($id)
	{
		return $this->findUserById($id)->delete();
	}
}
