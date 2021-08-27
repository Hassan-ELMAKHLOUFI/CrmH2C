<?php

namespace App\Http\Controllers;

use App\Models\Upcoming;
use Illuminate\Http\Request;
use App\Http\Resources\UpcomingResource;
use Illuminate\Support\Facades\DB;
class UpcomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function home(){
         return view('welcome');
     }
    public function index()
    {
         $upcoming = Upcoming::all();
         return UpcomingResource::collection($upcoming) ;
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request =json_decode($request->getContent());


        DB::table('upcomings')->insert([
            'title' => $request->title,
            'completed' => $request->completed,
            'approved' => $request->approved,
            'waiting' => $request->waiting
        ]);

        
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upcoming  $upcoming
     * @return \Illuminate\Http\Response
     */
    public function show(Upcoming $upcoming)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upcoming  $upcoming
     * @return \Illuminate\Http\Response
     */
    public function edit(Upcoming $upcoming)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upcoming  $upcoming
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request =json_decode($request->getContent());

        $upcoming= Upcoming::findOrFail($request->id);
         $upcoming->title = $request->title;
         $upcoming->save();
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upcoming  $upcoming
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upcoming $upcoming)
    {
        
    }
}
