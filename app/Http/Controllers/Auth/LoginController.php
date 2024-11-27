<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;    

class LoginController extends Controller
{
    public function login() {
        return view('Auth.login');
    }

    public function register() {
        return view('Auth.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if ($user->role_id === 1) {
                //admin dashboard
                return redirect()->intended('dashboard')->with('success', 'Logged in successfully with admin');
            } elseif ($user->role_id === 2) {
                 //employee dashboard
                return redirect()->intended('dashboard')->with('success', 'Logged in successfully with employee');
            }

            return redirect()->route('login')->with('error', 'Role not defined');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully');
    }
}
