<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Nos regresa la vista del formulario
        return view('project.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->status = "ACTIVO";
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->save();
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return view('project.form', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->status = "ACTIVO";
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');

        $project->update();
        return redirect()->route('projects.show', $project->id)
                        ->with(['message' => 'El proyecto se atualizo corectamente']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('projects.index')
                        ->with(['message' => 'Proyecto eliminado correctamente']);
    }
}
