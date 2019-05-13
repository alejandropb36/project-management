<?php

namespace App\Http\Controllers;

use App\Homework;
use App\User;
use App\Project;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeworks = Homework::all();
        return view('homeworks.index', compact('homeworks'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $users = User::all();
        /*$project = Project::all();*/
        /*return view('homeworks.form', compact('project'));*/
        /*$project = $this->project;
        $users = $project->users;*/
        return view('homeworks.form', compact('users','project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $homework = new Homework();
        $homework->name = $request->input('name');
        $homework->description = $request->input('description');
        $homework->status = "ACTIVO";
        $homework->project_id = $request->input('project_id');
        $homework->user_id = $request->input('user_id');
        $homework->document = $request->input('document');
        $homework->start_date = $request->input('start_date');
        $homework->end_date = $request->input('end_date');
        $homework->save();
        return redirect()->route('homeworks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        return view('homeworks.show', compact('homework'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework,Project $project)
    {
        $users = User::all();
        return view('homeworks.form', compact('homework','users','project'));
    }


    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homework $homework)
    {
        $homework->name = $request->input('name');
        $homework->description = $request->input('description');
        $homework->status = "ACTIVO";
        $homework->project_id = $request->input('project_id');
        $homework->user_id = $request->input('user_id');
        $homework->document = $request->input('document');
        $homework->start_date = $request->input('start_date');
        $homework->end_date = $request->input('end_date');
        $homework->update();
        return redirect()->route('homeworks.show', $homework->id)
                         ->with(['message' => 'La tarea se atualizo correctamente']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        //
        $homework->delete();
        return redirect()->route('homeworks.index')
                        ->with(['message' => 'Tarea eliminada correctamente']);
    }
}
