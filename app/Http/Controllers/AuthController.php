<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login()
    {
        return inertia('Auth/Login');
    }
    public function register()
    {
        return inertia('Auth/Register');
    }
    public function post_login()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function post_register()
    {
        $attrs = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
        ]);
        $user = User::create($attrs);
        auth()->login($user);
        request()->session()->regenerate();
        return redirect()->intended();
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
