<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // sleep(1);


        //Validate
        $fields = $request->validate([
            'avatar' => ['file', 'nullable', 'max: 300'],
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        if ($request->hasFile('avatar')) {
            $fields['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        //Register
        $user = User::create($fields);
        //Login
        Auth::login($user);

        //Redirect
        return redirect()->route('dashboard')->with('message', 'Welcome to Laravel Inertia Vue App');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);



        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('message', 'Welcome to Laravel Inertia Vue App');
        }



        return back()->withErrors([

            'email' => 'The provided credentials do not match our records.',

        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
