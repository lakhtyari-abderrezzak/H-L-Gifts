<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $feilds = $request->validate([
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($feilds)){
            $user = Auth::user();
            return redirect('/dashboard');
        }
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->Invalidate();
        // Regenrate @crcf Token
        $request->session()->regenerateToken();
        //Redirect user
        return redirect()->route('login');
    }
}
