<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpcomingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\DB;
use App\Models\Upcoming ;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//upcoming 
Route::get("/upcoming" ,  [UpcomingController::class, 'index']);

Route::post ("/upcoming" , [UpcomingController::class, 'store']);

Route::put ("/upcoming" , [UpcomingController::class, 'update']);
Route::post("/login",[LoginController::class,'login']);
Route::post("/register",[RegisterController::class,'store']);

Route ::delete ("/upcoming/{id}", function ($id){
    DB::table('upcomings')->where('id',$id)->delete(); 
    return 200 ;

});