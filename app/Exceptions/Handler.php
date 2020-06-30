<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException as AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof QueryException) {
            return response()->json([
                'error'         => true,
                'title'         => 'Erro interno',
                'message'       => "SQL Error: " . explode(':', $exception->getMessage())[0],
                'response_code' => 500,
                'status'        => 500,
            ], 500);
        }

        if ($exception instanceof InvalidArgumentException) {
            return response()->json([
                'error'         => true,
                'title'         => 'Erro interno',
                'message'       => "SQL Error: " . explode(':', $exception->getMessage())[0],
                'status'        => 500,
                'response_code' => 500
            ], 500);
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return response()->json([
                'error'         => true,
                'title'         => 'Não Autorizado',
                'message'       => $exception->getMessage(),
                'status'        => 401,
                'response_code' => 401
            ], 401);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error'         => true,
                'title'         => 'Método não permitido',
                'message'       => $exception->getMessage(),
                'status'        => 405,
                'response_code' => 405
            ], 405);
        }

        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error'         => true,
                'title'         => 'Registro não encontrado',
                'message'       => $exception->getMessage(),
                'status'        => 404,
                'response_code' => 404
            ], 404);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error'         => true,
                'title'         => 'Url Não Encontrada',
                'message'       => $exception->getMessage(),
                'status'        => 404,
                'response_code' => 404
            ], 404);
        }

        if ($exception instanceof AuthorizationException) {
            return response()->json([
                'error'         => true,
                'title'         => 'Você não tem permissão para executar esta operação',
                'message'       => 'Você não tem permissão para executar esta operação',
                'status'        => 403,
                'response_code' => 403
            ], 403);
        }

        if ($exception instanceof ThrottleRequestsException) {
            return response()->json([
                'error'         => true,
                'title'         => 'Too many attemps',
                'message'       => $exception->getMessage(),
                'status'        => 403,
                'response_code' => 403
            ], 403);
        }

        if ($exception instanceof ValidationException) {

            $errors = parent::render($request, $exception)->original['errors'];

            return response()->json([
                'error'         => true,
                'errors'        => $errors,
                'title'         => 'Erro ao relizar a operação',
                'message'       => 'Erro na validação dos dados informados',
                'response_code' => 422,
                'status'        => 422,
            ], 422);
        }

        if ($exception instanceof Exception) {

            return response()->json([
                'error'         => true,
                'title'         => 'Erro ao relizar a operação',
                'message'       => $exception->getMessage(),
                'response_code' => 500,
                'status'        => 500,
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
