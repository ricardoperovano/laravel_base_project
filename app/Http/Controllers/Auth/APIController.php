<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * @group  Autenticação
 */
class APIController extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * Login
     * Esta rota provê um token, para ser utilizado em todas as outras requisições nesta api
     * 
     * @response  200 {
     *  "success": true,
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5MzU0MzMwNSwiZXhwIjoxNTkzNTQ2OTA1LCJuYmYiOjE1OTM1NDMzMDUsImp0aSI6IkQ4UEpYcGoxOEhCZ0tpdHAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJlbXByZXNhX2lkIjoxLCJuYW1lIjoiTHVpeiBSaWNhcmRvIFBlcm9244aderwiZW1haWwiOiJyaWNhcmRvQG1ldWx1Y3JvLmNvbS5iciJ9.TESvCwLN3GsFwEI7grN6013IMpNpVA0uJqipr4VdFH4"
     *  }
     * 
     * @response  401 {
     *  "success": false,
     *  "errors": {
     *     "global": [
     *      "Invalid Email or Password"
     *     ]
     *   },
     *  "status": 401
     *  }
     * 
     * @bodyParam email string required Email do usuário
     * @bodyParam password string required Senha do usuário
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'errors'  => ['global' => ['Invalid Email or Password']],
                'status'  => 401
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    /**
     * Logout
     * Esta rota adiciona o token do usuário na blacklist
     * 
     * @response  200 {
     *  "success": true,
     *  "message": "User logged out successfully"
     *  }
     * 
     * @response 401 {
     *      "error": true,
     *      "title": "Não Autorizado",
     *      "message": "Token not provided | The token has been blacklisted",
     *      "status": 401,
     *      "response_code": 401
     *  }
     * @authenticated
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        try {
            JWTAuth::parseToken()->invalidate(true);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    /**
     * Refresh Token
     * Esta rota atualiza o token do usuário
     * 
     * @response  200 {
     *  "success": true,
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5MzU0MzMwNSwiZXhwIjoxNTkzNTQ2OTA1LCJuYmYiOjE1OTM1NDMzMDUsImp0aSI6IkQ4UEpYcGoxOEhCZ0tpdHAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJlbXByZXNhX2lkIjoxLCJuYW1lIjoiTHVpeiBSaWNhcmRvIFBlcm9244aderwiZW1haWwiOiJyaWNhcmRvQG1ldWx1Y3JvLmNvbS5iciJ9.TESvCwLN3GsFwEI7grN6013IMpNpVA0uJqipr4VdFH4"
     *  }
     * 
     * @response 401 {
     *      "error": true,
     *      "title": "Não Autorizado",
     *      "message": "Token not provided | The token has been blacklisted",
     *      "status": 401,
     *      "response_code": 401
     *  }
     * @authenticated
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = JWTAuth::getToken();

        return response()->json([
            'success'       => true,
            'token'         => JWTAuth::refresh($token)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }
}
