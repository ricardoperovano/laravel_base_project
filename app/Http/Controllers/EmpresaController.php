<?php

namespace App\Http\Controllers;

use App\Http\Requests\Empresa\AddEmpresaRequest;
use App\Http\Requests\Empresa\UpdateEmpresaRequest;
use App\Http\Resources\Empresa\EmpresaResource;
use App\Http\Resources\Empresa\EmpresaResourceCollection;
use App\Contracts\EmpresaContract;
use App\Models\Empresa;
use Illuminate\Http\Request;

/**
 * @group  Empresa
 */
class EmpresaController extends Controller
{

	/**
	 * EmpresaController constructor.
	 * @param Request $request
	 * @param EmpresaContract $empresaRepository
	 */
	public function __construct(Request $request, EmpresaContract $empresaRepository)
	{
		parent::__construct($request);

		/**
		 * Get Empresa Repository.
		 */
		$this->repository = $empresaRepository;

		/**
		 * Especify fields to return.
		 * The Id field is automatically returned.
		 * Example.: $this->showColumns = array_merge($this->showColumns, ["fieldName" => "Column Title"]);
		 */
		$this->showColumns = array_merge($this->showColumns, [/*"fieldName" => "Column Title"*/]);
	}

	/**
	 * Listar
	 * Lista de empresas cadastradas
	 * @queryParam take Quantidade de registros que será retornado Ex: 20
	 * @queryParam skip Quantidade de registros para saltar Ex: 20
	 * @queryParam order Nome do campo para ordenar Ex: nome
	 * @queryParam orderDirection Direção da ordenação Ex: asc, desc
	 * @queryParam search Texto para ser utilizado como pesquisa entre os registros
	 * @authenticated
	 * 
	 * @return EmpresaResourceCollection
	 */
	public function list()
	{
		/**
		 * Verifica se o usuário tem permissão para listar registros
		 */
		if (!$this->currentUser()->allowed('listar_')) return $this->notAllowedResponse();

		$resource = $this->repository->listEmpresa(
			$this->skip,
			$this->take,
			$this->order,
			$this->orderDirection,
			$this->relationships,
			array_merge(['empresa_id' => $this->currentCompany()->id], $this->filter),
			array('*'),
			$this->search
		);

		$total_records = $this->currentCompany(['empresas'])->empresas->count();
		$total_filtered = $this->search ? $resource->count() : $total_records;

		$data = [
			'total_records'    => $total_records,
			'total_filtered'   => $total_filtered,
			'order'            => [
				'column' 	=> $this->order,
				'direction' => $this->orderDirection
			],
			'data'             => new EmpresaResourceCollection($resource),
			'columns'		    => $this->showColumns,
		];

		return $this->responseJson(false, 200, "", $data);
	}

	/**
	 * Consultar
	 * Esta rota consulta uma empresa específica
	 * @urlParam empresa required Id da empresa
	 * @authenticated
	 *  
	 * @param int $id
	 * @return EmpresaResource
	 */
	public function get($id)
	{
		$data = $this->repository->findEmpresaById($id);

		return $this->responseJson(false, 200, "", new EmpresaResource($data));
	}

	/**
	 * Adicionar
	 * Esta rota cria uma nova empresa
	 * @bodyParam nome string required Nome da Empresa
	 * @bodyParam cnpj string required Cnpj
	 * @authenticated
	 *  
	 * @param AddEmpresaRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function create(AddEmpresaRequest $request)
	{
		$empresa = $this->repository->createEmpresa(
			array_merge($request->all(), [
				'empresa_id' => $this->currentCompany()->id
			])
		);

		return $this->responseJson(false, 200, "Registro Incluído com Sucesso", new EmpresaResource($empresa));
	}

	/**
	 * Modificar
	 * Esta rota faz alterações no cadastro da empresa
	 * @bodyParam nome string required Nome da empresa
	 * @bodyParam cnpj string Cnpj
	 * @authenticated
	 * 
	 * @param \App\Models\Empresa $empresa
	 * @param UpdateEmpresaRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(Empresa $empresa, UpdateEmpresaRequest $request)
	{
		$this->repository->updateEmpresa(array_merge(request()->all(), ["id" => $empresa->id]));

		return $this->responseJson(false, 200, "Registro Atualizado com Sucesso", new EmpresaResource($empresa->fresh()));
	}

	/**
	 * Excluir
	 * Esta rota exclui a(s) empresa(s) passado como parâmetro {empresa} na url
	 * @urlParam empresa required Ids que serão excluídos separados por virgula Ex: 1,20,55
	 * @authenticated
	 * 
	 * @param \App\Models\Empresa $empresa
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function delete($empresa)
	{
		$ids = explode(',', $empresa);

		foreach ($ids as $id) {
			$this->repository->deleteEmpresa((int) $id);
		}

		return $this->responseJson(false, 200, "Registro Excluído com Sucesso");
	}
}
