<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\AddUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserResourceCollection;
use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group  Usuário
 */
class UserController extends Controller
{

	/**
	 * UserController constructor.
	 * @param Request $request
	 * @param UserContract $userRepository
	 */
	public function __construct(Request $request, UserContract $userRepository)
	{
		parent::__construct($request);

		/**
		 * Get User Repository.
		 */
		$this->repository = $userRepository;

		/**
		 * Especify fields to return.
		 * The Id field is automatically returned.
		 * Example.: $this->showColumns = array_merge($this->showColumns, ["fieldName" => "Column Title"]);
		 */
		$this->showColumns = array_merge($this->showColumns, [/*"fieldName" => "Column Title"*/]);
	}

	/**
	 * Listar
	 * Lista de usuários cadastrados
	 * @queryParam take Quantidade de registros que será retornado Ex: 20
	 * @queryParam skip Quantidade de registros para saltar Ex: 20
	 * @queryParam order Nome do campo para ordenar Ex: nome
	 * @queryParam orderDirection Direção da ordenação Ex: asc, desc
	 * @queryParam search Texto para ser utilizado como pesquisa entre os registros
	 * @authenticated
	 * 
	 * @return UserResourceCollection
	 */
	public function list()
	{
		/**
		 * Verifica se o usuário tem permissão para listar registros
		 */
		if (!$this->currentUser()->allowed('listar_')) return $this->notAllowedResponse();

		$resource = $this->repository->listUser(
			$this->skip,
			$this->take,
			$this->order,
			$this->orderDirection,
			$this->relationships,
			array_merge(['empresa_id' => $this->currentCompany()->id], $this->filter),
			array('*'),
			$this->search
		);

		$total_records = $this->currentCompany(['users'])->users->count();
		$total_filtered = $this->search ? $resource->count() : $total_records;

		$data = [
			'total_records'    => $total_records,
			'total_filtered'   => $total_filtered,
			'order'            => [
				'column' 	=> $this->order,
				'direction' => $this->orderDirection
			],
			'data'             => new UserResourceCollection($resource),
			'columns'		    => $this->showColumns,
		];

		return $this->responseJson(false, 200, "", $data);
	}

	/**
	 * Consultar
	 * Esta rota retorna um usuário especifico
	 * 
	 * @urlParam user required Id do usuário
	 * @authenticated
	 * 
	 * @param int $user
	 * @return UserResource
	 */
	public function get($id)
	{
		$data = $this->repository->findUserById($id);

		return $this->responseJson(false, 200, "", new UserResource($data));
	}

	/**
	 * Adicionar
	 * Esta rota cria um novo usuário
	 * @bodyParam nome string required Nome do usuário
	 * @bodyParam senha string required Senha
	 * @bodyParam confirmacao_senha string required Confirmação de Senha
	 * @bodyParam email string required Email
	 * @authenticated
	 * 
	 * @param AddUserRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function create(AddUserRequest $request)
	{
		$user = $this->repository->createUser(
			array_merge($request->all(), [
				'empresa_id' => $this->currentCompany()->id
			])
		);

		return $this->responseJson(false, 200, "Registro Incluído com Sucesso", new UserResource($user));
	}

	/**
	 * Modificar
	 * Esta rota faz alterações no cadastro do usuário
	 * @bodyParam nome string required Nome do usuário
	 * @bodyParam senha string Senha
	 * @bodyParam confirmacao_senha string Confirmação de Senha
	 * @bodyParam email string required Email
	 * @authenticated
	 * 
	 * @param \App\Models\User $user
	 * @param UpdateUserRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(User $user, UpdateUserRequest $request)
	{
		$this->repository->updateUser(array_merge(request()->all(), ["id" => $user->id]));

		return $this->responseJson(false, 200, "Registro Atualizado com Sucesso", new UserResource($user->fresh()));
	}

	/**
	 * Excluir
	 * Esta rota exclui o(s) usuário(s) passado como parâmetro {user} na url
	 * @urlParam user required Ids que serão excluídos separados por virgula Ex: 1,20,55
	 * @authenticated
	 * 
	 * @param \App\Models\User $user
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function delete($user)
	{
		$ids = explode(',', $user);

		foreach ($ids as $id) {
			$this->repository->deleteUser((int) $id);
		}

		return $this->responseJson(false, 200, "Registro Excluído com Sucesso");
	}
}
