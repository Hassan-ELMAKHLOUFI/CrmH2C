<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpcomingController;
use Illuminate\Support\Facades\DB;
use App\Models\Upcoming ;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//upcoming 
Route::get("/upcoming" ,  [UpcomingController::class, 'index']);

Route::post ("/upcoming" , [UpcomingController::class, 'store']);

Route::put ("/upcoming" , [UpcomingController::class, 'update']);

Route ::delete ("/upcoming/{id}", function ($id){
    DB::table('upcomings')->where('id',$id)->delete(); 
    return 200 ;

});