<?php

namespace App\Http\Controllers;

use App\Http\Requests\Log\AddLogRequest;
use App\Http\Requests\Log\UpdateLogRequest;
use App\Http\Resources\Log\LogResource;
use App\Http\Resources\Log\LogResourceCollection;
use App\Contracts\LogContract;
use App\Models\Log;
use Illuminate\Http\Request;

/**
 * @group  Log
 */
class LogController extends Controller
{

	/**
	 * LogController constructor.
	 * @param Request $request
	 * @param LogContract $logRepository
	 */
	public function __construct(Request $request, LogContract $logRepository)
	{
		parent::__construct($request);

		/**
		 * Get Log Repository.
		 */
		$this->repository = $logRepository;

		/**
		 * Especify fields to return.
		 * The Id field is automatically returned.
		 * Example.: $this->showColumns = array_merge($this->showColumns, ["fieldName" => "Column Title"]);
		 */
		$this->showColumns = array_merge($this->showColumns, [/*"fieldName" => "Column Title"*/]);
	}

	/**
	 * Listar
	 * Lista de logs
	 * @queryParam take Quantidade de registros que será retornado Ex: 20
	 * @queryParam skip Quantidade de registros para saltar Ex: 20
	 * @queryParam order Nome do campo para ordenar Ex: nome
	 * @queryParam orderDirection Direção da ordenação Ex: asc, desc
	 * @queryParam search Texto para ser utilizado como pesquisa entre os registros
	 * @authenticated
	 * 
	 * @return LogResourceCollection
	 */
	public function list()
	{
		/**
		 * Verifica se o usuário tem permissão para listar registros
		 */
		if (!$this->currentUser()->allowed('listar_')) return $this->notAllowedResponse();

		$resource = $this->repository->listLog(
			$this->skip,
			$this->take,
			$this->order,
			$this->orderDirection,
			$this->relationships,
			array_merge(['empresa_id' => $this->currentCompany()->id], $this->filter),
			array('*'),
			$this->search
		);

		$total_records = $this->currentCompany(['logs'])->logs->count();
		$total_filtered = $this->search ? $resource->count() : $total_records;

		$data = [
			'total_records'    => $total_records,
			'total_filtered'   => $total_filtered,
			'order'            => [
				'column' 	=> $this->order,
				'direction' => $this->orderDirection
			],
			'data'             => new LogResourceCollection($resource),
			'columns'		    => $this->showColumns,
		];

		return $this->responseJson(false, 200, "", $data);
	}

	/**
	 * Consultar
	 * Esta rota retorna um log especifico
	 * 
	 * @urlParam log required Id do log
	 * @authenticated
	 * 
	 * @param int $id
	 * @return LogResource
	 */
	public function get($id)
	{
		$data = $this->repository->findLogById($id);

		return $this->responseJson(false, 200, "", new LogResource($data));
	}

	/**
	 * Adicionar
	 * Esta rota cria um novo log.
	 * @bodyParam acao integer required Ação que foi executada Ex:  [ 'Excluir' => 1, 'Incluir' => 2, 'AtribuirPerfil' => 3, 'Alterar' => 4, 'AtribuirPermissão' => 5, 'RemoverPermissão' => 6, 'Entrou' => 7, 'LoginFalhou' => 8, 'Importar' => 9]
	 * @bodyParam classe string required Nome do usuário
	 * @bodyParam objeto_original string required Nome do usuário
	 * @bodyParam objeto_modificado string required Nome do usuário
	 * @bodyParam data string required Nome do usuário
	 * @bodyParam model_id string required Nome do usuário
	 * @authenticated
	 * 
	 * @param AddLogRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function create(AddLogRequest $request)
	{
		$log = $this->repository->createLog(
			array_merge($request->all(), [
				'empresa_id' => $this->currentCompany()->id
			])
		);

		return $this->responseJson(false, 200, "Registro Incluído com Sucesso", new LogResource($log));
	}
}
