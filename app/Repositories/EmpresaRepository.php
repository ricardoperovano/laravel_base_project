<?php

namespace App\Repositories;

use App\Models\Empresa;
use App\Contracts\EmpresaContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class EmpresaRepository
 *
 * @package \App\Repositories
 */
class EmpresaRepository extends BaseRepository implements EmpresaContract {

	/**
	 * EmpresaRepository constructor.
	 * @param Empresa $model
	 */
	public function __construct(Empresa $model)
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
	public function listEmpresa(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationships = [], array $filter = [], $columns = array('*'), $search = null)
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
	 * @return Empresa|mixed
	 */
	public function findEmpresaById(int $id, array $relationships = [])
	{
		try {
			return $this->findOneOrFail($id, $relationships);
		} catch (ModelNotFoundException $e){
			throw new ModelNotFoundException($e);
		}
	}

	/**
	 * @param array $params
	 * @return Empresa|mixed
	 */
	public function createEmpresa(array $params)
	{
		try {
			return Empresa::create($params);
		} catch (QueryException $e){
			throw new InvalidArgumentException($e->getMessage());
		}
	}

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateEmpresa(array $params)
	{
		return $this->findEmpresaById($params['id'])->update($params);
	}

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function deleteEmpresa($id)
	{
		return $this->findEmpresaById($id)->delete();
	}
}
