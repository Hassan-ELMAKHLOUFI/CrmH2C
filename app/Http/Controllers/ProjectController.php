<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
use App\Http\Resources\projectResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $project= project::all();
        return projectResource::collection($project) ;
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


        DB::table('projects')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'finished' => $request->finished,
            'user_id'=>auth::user()->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
         $request =json_decode($request->getContent());

         $project= project::findOrFail($request->id);
         $project->name = $request->name;
         $project->description = $request->description;
         $project->finished = $request->finished ;

         $project->save();

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
    }
}
