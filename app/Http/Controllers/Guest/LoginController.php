<?php

namespace App\Http\Controllers\Guest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Guest.Login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
           
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if(Auth::user()->role == 'admin')
            {
                return redirect()->intended('/admin');
            }
            return redirect()->intended();

        }

        return back()->with('errorLogin',"Login Failed!");
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
