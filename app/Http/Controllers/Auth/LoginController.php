<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function LoginView(){
        if(session('berhasil_login')){
            return redirect(route('dashboard'));
         }else{
            return view('auth.login');
         }
        
    }
    public function LoginAuth(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            session(['berhasil_login' => true]); 
            return redirect()->intended(route('dashboard'));
        }

        return back()->with('loginError','Login gagal');
    }

    public function Logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

}
