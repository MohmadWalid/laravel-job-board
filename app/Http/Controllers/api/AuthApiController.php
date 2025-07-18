<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthApiController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = auth('api')->attempt($credentials);

        // if the token not created -> So Unauthorized access !!
        if (! $token) {
            return response()->json([
                'message' => 'Unauthorized access!'
            ], 401);
        }

        // if the tocken created => So approved user
        return response()->json([
            'access_token' => $token
        ], 200);
    }

    public function refresh()
    {
        $newToken = JWTAuth::refresh(JWTAuth::getToken());

        return response()->json([
            'access_token' => $newToken,
        ]);
    }

    public function me()
    {
        $user = auth('api')->user();

        return response()->json($user);
    }

    public function logout()
    {
        // Revoke the token
        auth('api')->logout();

        return response()->json([
            'message' => 'Logged out successfully!'
        ], 200);
    }
}
