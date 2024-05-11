<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        $credenciais = $request->all(['email', 'password']);

        $token = auth('api')->attempt($credenciais);
        
        if($token) return response()->json(['token' => $token]);

        return response()->json(['error' => 'Invalid user'], 403);
        
    }

    public function logout() {
        auth('api')->logout();
        return response()->json(['message' => 'Logout was successful']);
    }

    public function refresh() {
        $token = auth('api')->refresh();
        return response()->json(['token' => $token]);
    }

    public function me() {
        return response()->json(auth()->user());
    }
}