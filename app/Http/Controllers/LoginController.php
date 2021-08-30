<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){

        if(Auth::attempt($request->only('email','password'))){
            return response()->json(Auth::user(),200);
        }
    }
}
