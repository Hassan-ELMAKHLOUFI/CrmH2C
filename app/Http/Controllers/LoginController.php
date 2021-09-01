<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function login(Request $request){

        if(Auth::attempt($request->only('email','password'))){
            return response()->json(Auth::user(),200);
        }
    }

    public function logout(){
        
        Auth::logout(); 
        Session::flush();
        return auth::user();   
    }
}
