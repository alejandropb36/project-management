<!--editado  vista create-edit tarea -->
@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    @if (session('message'))
    <div class="alert alert-succes">
      {{ session('message') }}
    </div>
    @endif
  <section class="content-header">
    <h1><i class="fa  fa-laptop"></i> Tarea
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home  "></i> Home</a></li>
      <li><a href="/projects">Proyectos</a></li>
      <li><a href="#">Detalle de proyecto</a></li>
      @if(isset($homework))
         <li class="active">Modificacion de tarea</li>
     @else
         <li class="active">Nueva tarea</li>
     @endif
    </ol>
  </section>
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        @if(isset($homework))
           <h3 class="box-title">Editar Tarea</h3>
       @else
           <h3 class="box-title">Registro de Tarea</h3>
       @endif
      </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
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
                  <div class="col-md-6">
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
                  </div>
                  <div class="col-md-6">
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
                  </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
          <button class="btn btn-primary ml-auto pull-right" type="submit">Guardar</button>
      </form>
      </div>
    </div>
  </section>
    </div>
@endsection
