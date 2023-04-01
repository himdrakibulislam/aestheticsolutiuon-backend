<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     /**
     * Handle an authentication attempt.
     */
    public function create(){
        if(Auth::guard("admin")->check()){
            return redirect('/');
        }
        return view('admin.auth.login');
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->back();
    }
}
