<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Logic for user login
        return view('pages.auth.signin');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->has('remember');

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user, $remember);
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard')->with('success', 'Login successful');
            } else {
                return redirect('/')->with('error', 'Login failed');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email or password is incorrect');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
