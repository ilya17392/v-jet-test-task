<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Requests\User\CreateUserRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\User\LoginUserRequest;
use App\Http\Controllers\Requests\User\RecoverPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\JWTAuth;


class AuthController extends Controller
{

    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(LoginUserRequest $request){

        try {

            $params = $request->getParams()->toArray();

            if (! $token = $this->jwt->attempt($params)) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }

        return response()->json(compact('token'));


    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(CreateUserRequest $request) {
        try {

            $params = $request->getParams()->toArray();
            $params['password'] = Hash::make($params['password']);
            $user = User::create($params);

            return response()->json([
                'success' => true,
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);

        }
        catch (\Exception $e)
        {
            return response()->json([
                'error' => 'Something went wrong when trying to register user, please try again later.',
            ], 500);
        }

    }

}
