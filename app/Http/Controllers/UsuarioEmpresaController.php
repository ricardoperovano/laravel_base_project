<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioEmpresa\AddUsuarioEmpresaRequest;
use App\Http\Requests\UsuarioEmpresa\UpdateUsuarioEmpresaRequest;
use App\Http\Resources\UsuarioEmpresa\UsuarioEmpresaResource;
use App\Http\Resources\UsuarioEmpresa\UsuarioEmpresaResourceCollection;
use App\Contracts\UsuarioEmpresaContract;
use App\Models\UsuarioEmpresa;
use Illuminate\Http\Request;

/**
 * @group  Empresa Usuário
 */
class UsuarioEmpresaController extends Controller
{

	/**
	 * UsuarioEmpresaController constructor.
	 * @param Request $request
	 * @param UsuarioEmpresaContract $usuarioEmpresaRepository
	 */
	public function __construct(Request $request, UsuarioEmpresaContract $usuarioEmpresaRepository)
	{
		parent::__construct($request);

		/**
		 * Get UsuarioEmpresa Repository.
		 */
		$this->repository = $usuarioEmpresaRepository;

		/**
		 * Especify fields to return.
		 * The Id field is automatically returned.
		 * Example.: $this->showColumns = array_merge($this->showColumns, ["fieldName" => "Column Title"]);
		 */
		$this->showColumns = array_merge($this->showColumns, [/*"fieldName" => "Column Title"*/]);
	}

	/**
	 * Listar
	 * Lista de usuários e suas empresas
	 * @queryParam take Quantidade de registros que será retornado Ex: 20
	 * @queryParam skip Quantidade de registros para saltar Ex: 20
	 * @queryParam order Nome do campo para ordenar Ex: nome
	 * @queryParam orderDirection Direção da ordenação Ex: asc, desc
	 * @queryParam search Texto para ser utilizado como pesquisa entre os registros
	 * @authenticated
	 * 
	 * @return UsuarioEmpresaResourceCollection
	 */
	public function list()
	{
		/**
		 * Verifica se o usuário tem permissão para listar registros
		 */
		if (!$this->currentUser()->allowed('listar_')) return $this->notAllowedResponse();

		$resource = $this->repository->list(
			$this->skip,
			$this->take,
			$this->order,
			$this->orderDirection,
			$this->relationships,
			array_merge(['empresa_id' => $this->currentCompany()->id], $this->filter),
			array('*'),
			$this->search
		);

		$total_records = $this->currentCompany(['usuarioEmpresas'])->usuarioEmpresas->count();
		$total_filtered = $this->search ? $resource->count() : $total_records;

		$data = [
			'total_records'    => $total_records,
			'total_filtered'   => $total_filtered,
			'order'            => [
				'column' 	=> $this->order,
				'direction' => $this->orderDirection
			],
			'data'             => new UsuarioEmpresaResourceCollection($resource),
			'columns'		    => $this->showColumns,
		];

		return $this->responseJson(false, 200, "", $data);
	}

	/**
	 * Consultar
	 * Esta rota consulta um usuário em uma empresa
	 * @urlParam empresaUsuario required Id da empresa de usuário
	 * @authenticated
	 * 
	 * @param int $id
	 * @return UsuarioEmpresaResource
	 */
	public function get($id)
	{
		$data = $this->repository->findUsuarioEmpresaById($id);

		return $this->responseJson(false, 200, "", new UsuarioEmpresaResource($data));
	}

	/**
	 * Adicionar
	 * Esta rota adiciona um usuário à uma empresa
	 * @bodyParam idUsuario integer required Id do Usuário
	 * @bodyParam idEmpresa integer required Id da Empresa
	 * @authenticated
	 * 
	 * @param AddUsuarioEmpresaRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function create(AddUsuarioEmpresaRequest $request)
	{
		$usuarioEmpresa = $this->repository->create(
			array_merge($request->all(), [
				'empresa_id' => $this->currentCompany()->id
			])
		);

		return $this->responseJson(false, 200, "Registro Incluído com Sucesso", new UsuarioEmpresaResource($usuarioEmpresa));
	}

	/**
	 * Modificar
	 * Esta rota faz alterações no usuário de uma empresa
	 * @urlParam usuarioEmpresa required Id da empresa de usuário
	 * @bodyParam ativo bool required Usuário está ativo na empresa
	 * @authenticated
	 * 
	 * @param \App\Models\UsuarioEmpresa $usuarioEmpresa
	 * @param UpdateUsuarioEmpresaRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(UsuarioEmpresa $usuarioEmpresa, UpdateUsuarioEmpresaRequest $request)
	{
		$this->repository->update(array_merge(request()->all()), $usuarioEmpresa->id);

		return $this->responseJson(false, 200, "Registro Atualizado com Sucesso", new UsuarioEmpresaResource($usuarioEmpresa->fresh()));
	}

	/**
	 * Excluir
	 * Esta rota exclui um usuário de uma empresa
	 * @urlParam usuarioEmpresa required Ids que serão excluídos separados por virgula Ex: 1,20,55
	 * @authenticated
	 * @param \App\Models\UsuarioEmpresa $usuarioEmpresa
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function delete($usuarioEmpresa)
	{
		$ids = explode(',', $usuarioEmpresa);

		foreach ($ids as $id) {
			$this->repository->delete((int) $id);
		}

		return $this->responseJson(false, 200, "Registro Excluído com Sucesso");
	}
}
