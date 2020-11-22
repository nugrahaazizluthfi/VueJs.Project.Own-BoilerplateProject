<?php

namespace App\Http\Controllers\API\BO;

use App\Http\Controllers\BaseController;
use App\Services\BO\AuthenticationService as Authentication;

class AuthController extends BaseController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['signin']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signin(Authentication $auth)
    {
        if (!$result = $auth->signin(request(['email', 'password']))) {
            return $this->error(null,'Username/password is wrong!', 401);
        }

        return $this->success($result, 'Signin success...');
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signout(Authentication $auth)
    {
        $auth->signout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
