<?php

namespace App\Contracts;

/**
 * Interface EmpresaContract
 * @package App\Contracts
 */
interface EmpresaContract{

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
	public function listEmpresa(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationships = [], array $filter = [], $columns = array('*'), $search = null);

	/**
	 * @param int $id
	 * @param array $relationships
	 * @return Empresa|mixed
	 */
	public function findEmpresaById(int $id, array $relationships = []);

	/**
	 * @param array $params
	 * @return Empresa|mixed
	 */
	public function createEmpresa(array $params);

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateEmpresa(array $params);

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function deleteEmpresa($id);

}