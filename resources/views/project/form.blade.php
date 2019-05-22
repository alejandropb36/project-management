@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <div class="page-title">
            @if(isset($project))
                <h3 class="card-title">Editar proyecto</h3>
            @else
                <h3 class="card-title">Capturar proyecto</h3>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sd-11 col-xs-11 ">
            <div class="card">
                <div class="card-header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    @if(isset($project))
                        <form action="{{ route('projects.update', $project->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                    @else
                        <form action="{{ route('projects.store') }}" method="POST">
                    @endif
                        @csrf

                        <div class="form-group ">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" 
                                value="{{ isset($project) ? $project->name : '' }}{{ old('project') }}"
                                placeholder="Nombre del proyecto">
                        </div>

                        <div class="form-group ">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="description"
                                value="{{ isset($project) ? $project->description : '' }}{{ old('project') }}"
                                placeholder="Descripción del proyecto">
                        </div>
                        
                        <div class="form-group ">
                            <label class="form-label">Estatus</label>
                            <select name="status"  class="form-control">
                                <option value="{{ isset($project) ? $project->status : 'Activo' }}{{ old('project') }}" selected>
                                    {{ isset($project) ? $project->status : 'Activo' }}{{ old('project') }}
                                </option>
                                <option value="Activo">Activo</option>
                                <option value="Terminado">Terminado</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="col-4 col-form-label">Fecha de inicio</label>
                            <div class="col-8">
                                <input class="form-control" type="date" name="start_date"
                                    value="{{ isset($project) ? $project->start_date : '' }}{{ old('project') }}" >
                            </div>
 
                        </div>

                        <div class="form-group">
                            <label for="end_date" class="col-4 col-form-label">Fecha de termino (opcional)</label>
                            <div class="col-8">
                                <input class="form-control" type="date" name="end_date"
                                    value="{{ isset($project) ? $project->end_date : '' }}{{ old('project') }}" >
                            </div>
                        </div>
                        
                        <button class="btn btn-primary ml-auto" type="submit">Guardar</button>
                    </form>  
                        
                </div>
            </div>
        </div>
    </div>
@endsection