<?php

namespace App\Http\Controllers;

use App\Http\Resources\activityResource;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $Activity= DB::table('Activities')->get();
        return ActivityResource::collection($Activity) ;
    }

    public function Pagination($page)
    {
        $test=[];
        $Activity = DB::table('Activities')
            ->offset($page*3)
            ->limit(3)
            ->get();
        $ActivityJson = ActivityResource::collection($Activity);

        //$laux= json_decode($projectJson);
        array_push($test, $ActivityJson);
        array_push($test, $page);


        return json_encode($test) ;
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


        DB::table('Activities')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id'=>auth::user()->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}
