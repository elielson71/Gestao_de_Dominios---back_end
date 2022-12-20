<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            abort(401, 'Invalid Credentials');
        }

        $token = $request->user()->createToken($request->email);
        return response()
            ->json(['data' => [
                'token' => $token->plainTextToken
            ]],200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()
            ->json([], 204);
    }
}
