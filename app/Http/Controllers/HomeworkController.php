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
    public function index(Request $request)
    {
        $status = $request->get('status');

        $homeworks = Homework::all();
        $homeworks = Homework::status($status)->paginate(3);
        return view('homework.index', compact('homeworks'));
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
        return view('homework.form', compact('users','project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'project_id' => 'required',
            'user_id' => 'required',
            'satart_date' => 'date',
            'end_date' => 'date|nullable',
        ]);
        $homework = new Homework();
        $homework->name = $request->input('name');
        $homework->description = $request->input('description');
        $homework->status = $request->input('status');
        $homework->project_id = $request->input('project_id');
        $homework->user_id = $request->input('user_id');
        $homework->document = $request->input('document');
        $homework->start_date = $request->input('start_date');
        $homework->end_date = $request->input('end_date');
        $homework->save();
        return redirect()->route('projects.show', $homework->project_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        return view('homework.show', compact('homework'));
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
        return view('homework.form', compact('homework','users','project'));
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
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'project_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'satart_date' => 'date',
            'end_date' => 'date|nullable',
        ]);
        $homework->name = $request->input('name');
        $homework->description = $request->input('description');
        $homework->status = $request->input('status');
        $homework->project_id = $request->input('project_id');
        $homework->user_id = $request->input('user_id');
        $homework->document = $request->input('document');
        $homework->start_date = $request->input('start_date');
        $homework->end_date = $request->input('end_date');
        $homework->update();
        return redirect()->route('projects.show', $homework->project_id)
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
