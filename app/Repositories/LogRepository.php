<?php

namespace App\Repositories;

use App\Models\Log;
use App\Contracts\LogContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class LogRepository
 *
 * @package \App\Repositories
 */
class LogRepository extends BaseRepository implements LogContract {

	/**
	 * LogRepository constructor.
	 * @param Log $model
	 */
	public function __construct(Log $model)
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
	public function listLog(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationships = [], array $filter = [], $columns = array('*'), $search = null)
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
	 * @return Log|mixed
	 */
	public function findLogById(int $id, array $relationships = [])
	{
		try {
			return $this->findOneOrFail($id, $relationships);
		} catch (ModelNotFoundException $e){
			throw new ModelNotFoundException($e);
		}
	}

	/**
	 * @param array $params
	 * @return Log|mixed
	 */
	public function createLog(array $params)
	{
		try {
			return Log::create($params);
		} catch (QueryException $e){
			throw new InvalidArgumentException($e->getMessage());
		}
	}

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateLog(array $params)
	{
		return $this->findLogById($params['id'])->update($params);
	}

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function deleteLog($id)
	{
		return $this->findLogById($id)->delete();
	}
}
