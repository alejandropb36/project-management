@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <div class="page-title">
            Editar rol de usuario en el proyecto :   {{ $project->name }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sd-11 col-xs-11 ">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                    <form action=" {{ route('projects.updateUserRole') }} " method="POST" >
                        @csrf

                        <div class="form-group " hidden>
                            <input type="text" class="form-control" name="project_id" 
                                value="{{ $project->id }} ">
                        </div>

                        <div class="form-group " >
                            <label class="form-label" >{{ $user->id . ' - ' . $user->name }}</label>
                        </div>
                        
                        <div class="form-group " hidden>
                            <input type="text" class="form-control" name="project_id" 
                                value="{{ $user->id }} ">
                        </div>
                        
                        <div class="form-group ">
                            <label class="form-label">Rol</label>
                            <select name="user_role"  class="form-control">
                                <option value="Colaborador">Colaborador</option>
                                <option value="Lider">Lider</option>
                            </select>
                        </div>

                        <button class="btn btn-primary ml-auto" type="submit">Guardar</button>
                    </form>  
                        
                </div>
            </div>
        </div>
    </div>
@endsection