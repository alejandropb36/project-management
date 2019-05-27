<!-- agregar o editar informacion de un proyecto -->
@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fas fa-file-text"></i> Proyecto</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="/projects">Proyectos</a></li>

      @if(isset($project))
          <li class="active">Edicion de proyecto</li>
      @else
          <li class="active">Registro de proyecto</li>
      @endif
      <div class="pull-right">
    </ol>

    @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
          <div class="box-header with-border">
            <!-- name box-->
            @if(isset($project))
                <h3 class="box-title">Editar proyecto</h3>
            @else
                <h3 class="box-title">Registro de proyecto</h3>
            @endif
            <div class="pull-right">
              <!-- button -->
              <!-- <a href="{{route('projects.create')}}"><button class="btn btn-success"><i class="fas fa-file-text"></i> Nuevo Proyecto</button></a> -->
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <main class="py-4">
                <!-- contenido -->
                @if(isset($project))
                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                @else
                    <form action="{{ route('projects.store') }}" method="POST">
                @endif
                    @csrf

                      <div class="col-md-6">
                        <div class="form-group ">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" 
                                value="{{ isset($project) ? $project->name : '' }}{{ old('project') }}"
                                placeholder="Nombre del proyecto">
                        </div>

                          <div class="form-group ">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="description" value="{{ isset($project) ? $project->description : '' }}{{ old('project') }}" placeholder="Descripción del proyecto">
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
                      </div>

                      <div class="col-md-6">
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
                  </div>
                </main>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button class="btn btn-primary ml-auto pull-right" type="submit">Guardar</button>
        </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
