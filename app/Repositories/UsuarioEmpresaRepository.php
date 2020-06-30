<?php

namespace App\Repositories;

use App\Models\UsuarioEmpresa;
use App\Contracts\UsuarioEmpresaContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class UsuarioEmpresaRepository
 *
 * @package \App\Repositories
 */
class UsuarioEmpresaRepository extends BaseRepository implements UsuarioEmpresaContract {

	/**
	 * UsuarioEmpresaRepository constructor.
	 * @param UsuarioEmpresa $model
	 */
	public function __construct(UsuarioEmpresa $model)
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
	public function listUsuarioEmpresa(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationships = [], array $filter = [], $columns = array('*'), $search = null)
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
	 * @return UsuarioEmpresa|mixed
	 */
	public function findUsuarioEmpresaById(int $id, array $relationships = [])
	{
		try {
			return $this->findOneOrFail($id, $relationships);
		} catch (ModelNotFoundException $e){
			throw new ModelNotFoundException($e);
		}
	}

	/**
	 * @param array $params
	 * @return UsuarioEmpresa|mixed
	 */
	public function createUsuarioEmpresa(array $params)
	{
		try {
			return UsuarioEmpresa::create($params);
		} catch (QueryException $e){
			throw new InvalidArgumentException($e->getMessage());
		}
	}

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateUsuarioEmpresa(array $params)
	{
		return $this->findUsuarioEmpresaById($params['id'])->update($params);
	}

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function deleteUsuarioEmpresa($id)
	{
		return $this->findUsuarioEmpresaById($id)->delete();
	}
}
