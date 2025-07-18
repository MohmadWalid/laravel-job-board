<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // SingUp (GET), SingUp (POST)
    public function showSignupForm()
    {
        return view('auth.signup', ['pageTitle' => 'SignUp']);
    }
    public function signup(SignupRequest $request)
    {
        $user = new User();

        $user->name = request()->input('name');
        $user->email = request()->input('email');
        $user->password = request()->input('password');

        $user->save();

        Auth::login($user);

        return redirect(route('index'));
    }
    // LogIn (GET), LogIn (POST)
    public function showLoginForm()
    {
        return view('auth.login', ['pageTitle' => 'LogIn']);
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    // LogOut (POST)
    public function logout()
    {
        Auth::logout();

        return redirect(route('index'));
    }
}
