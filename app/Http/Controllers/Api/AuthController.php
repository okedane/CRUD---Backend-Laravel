<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if (!auth()->Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Salah'
            ], 401);
        }

        $user = auth()->Auth::user();
        $token = $user->createToken('mobile_token')->plainTextToken;

        return response()->json([
            'success'    => true,
            'message'    => 'Login Success',
            'data'       => [
                'user_id' => $user->id,
                'name'    => $user->name,
                'email'   => $user->email,
                'token'   => $token
            ]
        ]);
    }


    public function logout(Request $request)
    {
        $user = $request->user();
        $user->curentAccessToken()->delete();

        return response()->json([
            'success'   => true,
            'message'   => 'Logout Success'
        ]);
    }
}
