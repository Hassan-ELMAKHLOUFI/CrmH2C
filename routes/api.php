<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpcomingController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return auth::user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});


Route::middleware('auth:sanctum')->get('/isadmin', function () {
    return 0;

});

Route::get('/isadmin', function () {
        return true;
})->middleware('admin');


Route::get('/isclient', function () {
    return true;
})->middleware('client');

//Authentication
Route::post("/logout",[LoginController::class,'logout']);
Route::post("/login",[LoginController::class,'login']);
Route::post("/register",[RegisterController::class,'store']);



//upcoming
Route::get("/upcoming" ,  [UpcomingController::class, 'index']);
Route::get ("/upcoming/{page}" , [UpcomingController::class, 'Pagination']);

Route::post ("/upcoming" , [UpcomingController::class, 'store']);
Route::put ("/upcoming" , [UpcomingController::class, 'update']);

Route ::delete ("/upcoming/{id}", function ($id){
    DB::table('upcomings')->where('id',$id)->delete();
    DB::table('Activities')->insert([
        'name' => "delete task",
        'description' => "description of deleting a task",
        'created_at'=>Carbon::now(),
        'user_id'=>Auth::user()->id
    ]);
    return 200 ;

});


//project
Route::get("/project" ,  [projectController::class, 'index']);
Route::post ("/project" , [projectController::class, 'store']);
Route::put ("/project" , [projectController::class, 'update']);
Route::get ("/project/{page}" , [projectController::class, 'Pagination']);
Route ::delete ("/project/{id}", function ($id){
    DB::table('projects')->where('id',$id)->delete();
    return 200 ;

});

//user
Route ::get ("/users", [RegisterController::class, 'fetch']);
Route ::put ("/user", [RegisterController::class, 'update']);
Route ::delete ("/user/{id}", function ($id){
    DB::table('users')->where('id',$id)->delete();
    return 200 ;

});
Route::post("/user",[RegisterController::class,'store']);


//Activity
Route::get("/activity" ,  [ActivityController::class, 'index']);
Route::post ("/activity" , [ActivityController::class, 'store']);

