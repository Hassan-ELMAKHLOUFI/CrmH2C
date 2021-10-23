<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Models\User;
class RegisterController extends Controller
{
    function store (Request $request){
        // $request->validate([
        //     'name'=>['required'],
        //     'email' => ['required']
        // ])
        $id=User::insertGetId(
            [
            'name'=>$request->name,
            'email'=>$request->email,
            'is_admin'=>$request->is_admin,
            'password'=>Hash::make($request->password)
        ]
        );
        $user= DB::table('users')->where('id', $id)->get();
        $userJson = UserResource::collection($user) ;
        return $userJson;

    }

    function fetch(){
        $user = DB::table('users')
            ->get();
        $userJson = UserResource::collection($user) ;
        return $userJson;
    }


    public function update(Request $request)
    {
        $request = json_decode($request->getContent());

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->save();

        DB::table('Activities')->insert([
            'name' => "apdating task",
            'description' => "description updating a user",
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id
        ]);

    }
    }
