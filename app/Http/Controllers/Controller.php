<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var
     */
    public $showColumns = ["id" => "Id"];

    /**
     * @var
     */
    public $take = 10;

    /**
     * @var
     */
    public $skip = 0;

    /**
     * @var
     */
    public $order = "id";

    /**
     * @var
     */
    public $orderDirection = "asc";

    /**
     * @var
     */
    public $filter = [];

    /**
     * @var
     */
    public $join = [];

    /**
     * @var
     */
    public $search = null;

    /**
     * @var
     */
    public $relationships = [];

    public function __construct(Request $request)
    {
        if (request('take')) $this->take = $request->get('take');
        if (request('skip')) $this->skip = $request->get('skip');
        if (request('order')) $this->order = $request->get('order');
        if (request('search')) $this->search = $request->get('search');
        if (request('orderDirection')) $this->orderDirection = $request->get('orderDirection');
        if (request('filter')) {
            $filter = request('filter');
            $this->filter = gettype($filter) == "string" ? json_decode($filter) : $filter;
        }
    }

    /**
     * @param bool $error
     * @param int $responseCode
     * @param array $message
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null)
    {
        return response()->json([
            'error'         =>  $error,
            'response_code' =>  $responseCode,
            'message'       =>  $message,
            'payload'       =>  $data
        ], $responseCode);
    }

    public function currentUser()
    {
        return auth()->user();
    }

    public function currentCompany($relationships = [])
    {
        return Empresa::with($relationships)->find(auth()->user()->empresa_id);
    }

    public function notAllowedResponse($message = 'Você não possui permissão para executar esta operação')
    {
        return response()->json([
            'title'     => 'Não Autorizado',
            'message'   => $message,
            'status'    => 'error'
        ], 401);
    }
}
