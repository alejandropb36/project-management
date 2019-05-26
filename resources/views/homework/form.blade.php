@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <div class="page-title">
            @if(isset($homework))
                <h3 class="card-title">Editar Tarea</h3>
            @else
                <h3 class="card-title">Capturar Tarea</h3>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sd-11 col-xs-11 ">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                    @if(isset($homework))
                        <form action="{{ route('homeworks.update', $homework->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                    @else
                        <form action="{{ route('homeworks.store') }}" method="POST">
                    @endif
                        @csrf
                        <div class="form-group ">
                        {{-- <input type="hidden" class="form-control" name="project_id" value="{{$project->id}}"> --}}
                        <input type="hidden" class="form-control" name="project_id" value="{{ isset($homework) ? $homework->project_id : $project->id }}{{ old('homework') }}">
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" 
                                value=" {{ isset($homework) ? $homework->name : '' }}{{ old('homework') }} "
                                placeholder="Nombre de la tarea">
                        </div>
                        <div class="form-group ">
                                <label class="form-label">Usuario</label>
                                {{--<input type="text" class="form-control" name="user_id" 
                                value=" {{ isset($homework) ? $homework->user_id : '' }}{{ old('homework') }}"placeholder="ID Usuario">--}}
                                <select class="form-control" name="user_id">
                                @if(isset($homework))
                                    @foreach($users as $user)
                                        <option value="{{$homework->user_id}}">{{$homework->user_id}}</option> 
                                    @endforeach
                                @else
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}"> {{$user->name}} </option> 
                                    @endforeach
                                @endif
                                </select>
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="description"
                                value="{{ isset($homework) ? $homework->description : '' }}{{ old('homework') }}"
                                placeholder="Descripción de la homework">
                        </div>
                        <div class="form-group ">
                                <label class="form-label">Estatus</label>
                                <select name="status"  class="form-control">
                                    <option value="{{ isset($homework) ? $homework->status : '' }}{{ old('homework') }}" selected disabled>
                                        {{ isset($homework) ? $homework->status : '' }}{{ old('homework') }}
                                    </option>
                                    <option value="Activo">ACTIVO</option>
                                    <option value="Terminado">TERMINADO</option>
                                    <option value="Inactivo">INACTIVO</option>
                                </select>
                                {{-- <input type="text" class="form-control" name="description"
                                    value="{{ isset($project) ? $project->status : '' }}{{ old('project') }}"
                                    placeholder="Descripción del proyecto"> --}}
                        </div>

                        <div class="form-group ">
                            <label class="form-label">Avance</label>
                            <input type="text" class="form-control" name="document"
                                value="{{ isset($homework) ? $homework->document : '' }}{{ old('homework') }}"
                                placeholder="Avance del proyecto">
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="col-4 col-form-label">Fecha de inicio</label>
                            <div class="col-8">
                                <input class="form-control" type="date" name="start_date"
                                    value="{{ isset($homework) ? $homework->start_date : '' }}{{ old('homework') }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="col-4 col-form-label">Fecha de termino (opcional)</label>
                            <div class="col-8">
                                <input class="form-control" type="date" name="end_date"
                                    value="{{ isset($homework) ? $homework->end_date : '' }}{{ old('homework') }}" >
                            </div>
                        </div>
                        
                        <button class="btn btn-primary ml-auto" type="submit">Guardar</button>
                    </form>  
                        
                </div>
            </div>
        </div>
    </div>
@endsection