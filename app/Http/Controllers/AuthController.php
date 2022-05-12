<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        if(!Auth::user()){
            return view('login/login');
        }

        return redirect('schedule/0');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'can_login' => true], $request['remember'])) {
            $request->session()->regenerate();

            return redirect()->intended('schedule/0');
        }

        return back()->withInput()->withErrors([
            'failedLogin' => 'Hibás felhasználónév vagy jelszó!',
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
