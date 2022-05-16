<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        if(!Auth::user()){
            return view('login');
        }

        return redirect('/');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $request['remember'])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withInput()->withErrors([
            'failedLogin' => 'Hibás felhasználónév vagy jelszó!',
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('showLogin');
    }

    public function showRegister(){
        if(!Auth::user()){
            return view('register');
        }

        return redirect('/');
    }

    public function register(RegisterRequest $request){
        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('login');
    }
}
