<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpcomingController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\DB;
use App\Models\Upcoming ;
use App\Models\project ;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});


//Authentication
Route::post("/logout",[LoginController::class,'logout']);
Route::post("/login",[LoginController::class,'login']);
Route::post("/register",[RegisterController::class,'store']);



//upcoming 
Route::get("/upcoming" ,  [UpcomingController::class, 'index']);
Route::post ("/upcoming" , [UpcomingController::class, 'store']);
Route::put ("/upcoming" , [UpcomingController::class, 'update']);

Route ::delete ("/upcoming/{id}", function ($id){
    DB::table('upcomings')->where('id',$id)->delete(); 
    return 200 ;

});


//project 
Route::get("/project" ,  [projectController::class, 'index']);
Route::post ("/project" , [projectController::class, 'store']);
Route::put ("/project" , [projectController::class, 'update']);
Route ::delete ("/project/{id}", function ($id){
    DB::table('projects')->where('id',$id)->delete(); 
    return 200 ;

});