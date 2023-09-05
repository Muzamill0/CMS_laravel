<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'projects' => Project::paginate(15),
        ];
        return view('project.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'customers' => Customer::where('status', 1)->get(),
        ];
        return view('project.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'title' => 'required',
            'area' => 'required',
            'project_code' => 'required|unique:projects,project_code',
        ]);

        $data = [
            'customer_id' => $request->customer,
            'title' => $request->title,
            'area' => $request->area,
            'project_code' => $request->project_code,
            'status' => '1'
        ];

        $project_created = Project::create($data);
        if($project_created){
            return back()->with('success' , 'Project has been created');
        } else{
            return back()->with('error' , 'Project has failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data = [
            'customers' => Customer::where('status', 1)->get(),
            'project' => $project,
        ];
        return view('project.edit', $data);
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
        $request->validate([
            'customer' => 'required',
            'title' => 'required',
            'area' => 'required',
            'project_code' => 'required|unique:projects,project_code,'. $project->id .',id',
        ]);

        $data = [
            'customer_id' => $request->customer,
            'title' => $request->title,
            'area' => $request->area,
            'project_code' => $request->project_code,
            'status' => $request->status
        ];

        $project_updated = Project::find($project->id)->update($data);
        if($project_updated){
            return back()->with('success' , 'Project has been updated');
        } else{
            return back()->with('error' , 'Project has failed to update');
        }
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
