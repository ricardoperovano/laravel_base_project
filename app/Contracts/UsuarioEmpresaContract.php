<?php

namespace App\Contracts;

/**
 * Interface UsuarioEmpresaContract
 * @package App\Contracts
 */
interface UsuarioEmpresaContract{

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
	public function listUsuarioEmpresa(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationships = [], array $filter = [], $columns = array('*'), $search = null);

	/**
	 * @param int $id
	 * @param array $relationships
	 * @return UsuarioEmpresa|mixed
	 */
	public function findUsuarioEmpresaById(int $id, array $relationships = []);

	/**
	 * @param array $params
	 * @return UsuarioEmpresa|mixed
	 */
	public function createUsuarioEmpresa(array $params);

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateUsuarioEmpresa(array $params);

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function deleteUsuarioEmpresa($id);

}