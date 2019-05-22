<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
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
        $user = \Auth::user();
        $projects = $user->projects;
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
        
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:25',
            'satart_date' => 'date',
            'end_date' => 'date|nullable',
        ]);
        $user = $user = \Auth::user();
        $project = new Project();

        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->status = $request->input('status');
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->save();
        $user->projects()->attach($project->id, ['user_role' => 'Lider']);

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
        $user_role = "Colaborador";
        $user_auth = \Auth::user();

        foreach($project->users as $user){
            if($user->id == $user_auth->id){
                $user_role = $user->pivot->user_role;
            }
        }

        return view('project.show', compact('project','user_role'));
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
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:25',
            'satart_date' => 'date',
            'end_date' => 'date|nullable',
        ]);
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->status = $request->input('status');
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


    /**
     * Relationship project_user Form
     */
    public function createProjectUser(Project $project){
        $users = User::with('projects')->get();

        return view('project.projectUserForm',compact('project', 'users'));
    }

    /**
     * Store relationship project_user
     */
    public function storeProjectUser(Request $request){
        $validate = $this->validate($request, [
            'project_id' => 'required',
            'user_id' => 'required',
            'user_role' => 'required|string|max:255',
        ]);
        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        $user_role = $request->input('user_role');
        
        $project = Project::find($project_id);
    
        $project->users()->attach($user_id, ["user_role" => $user_role]);

        return redirect()->route('projects.show', $project->id)
                        ->with(['message' => 'Usuario agregador correctamente']);
    }

    /**
     * Editar rol del usuario
     */
    public function editUserRole(Project $project, User $user){

        $this->project = $project;
        $this->user = $user;
        $user_role = $project->users->find($user);
        $user_role = $user_role->pivot->user_role;

        return view('project.editUserRole', compact('project', 'user', 'user_role'));
    }

    /**
     * Update rol del usuario
     */
    public function updateUserRole(Request $request){

        $validate = $this->validate($request, [
            'project_id' => 'required',
            'user_id' => 'required',
            'user_role' => 'required|string|max:255',
        ]);

        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        $user_role = $request->input('user_role');

        $project = Project::find($project_id);

        /**
         * Documentacion de laravel
         * Updating A Record On A Pivot Table
         */
        $project->users()->updateExistingPivot($user_id, ['user_role' => $user_role]);
        /**
         * Esta forma funciona, la deduje yo, la otra 
         * es de la documentacion de laravel.
         */
        /*
        $user = $project->users;
        $user = $user->find($user_id);
        $user->pivot->user_role = $user_role;
        $user->pivot->update();
        */

        return redirect()->route('projects.show', $project->id)
                        ->with(['message' => 'Rol de usuario modificado correctamente']);
    }

    /**
     * Remove relationship user_project
     */
    public function destroyProjectUser(Project $project, User $user){
        $project->users()->detach($user);

        return redirect()->route('projects.show', $project->id)
                        ->with(['message' => 'Usuario eliminado correctamente']);
    }
}
