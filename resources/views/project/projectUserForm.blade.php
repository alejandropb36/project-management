@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-user-plus"></i> Incorporacion de usuario</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="/projects">Proyectos</a></li>
      <li><a href="#">Informacion del proyecto</a></li>
      <li class="active">Agregado de usuario</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-danger">
          {{ session('message') }}
        </div>
        @endif
        <div class="box box-default">
          <div class="box-header with-border">
            <!-- name box-->
            <h3 class="box-title">Proyecto :   {{ $project->name }}</h3>
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

                <form action=" {{ route('projects.storeProjectUser') }} " method="POST" >
                    @csrf

                    <div class="form-group " hidden>
                        <input type="text" class="form-control" name="project_id"
                            value="{{ $project->id }} ">
                    </div>

                    <div class="form-group ">
                      <div class="col-md-6">
                      <label class="form-label">Usuario</label>
                      <select name="user_id" id="user" class="form-control">
                        @foreach ($users as $user)
                        @if(!$user->projects->find($project->id))
                        <option value=" {{ $user->id }} "> {{ $user->id . ' - ' . $user->name }} </option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    </div>

                    <div class="form-group ">
                      <div class="col-md-6 ">
                        <label class="form-label">Rol</label>
                        <select name="user_role"  class="form-control">
                            <option value="Colaborador">Colaborador</option>
                            <option value="Lider">Lider</option>
                        </select>
                    </div>
                  </div>

                </main>
              </div>
            </div>
          </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-info btn-flat pull-right"><i class="fa fa-save"></i> Guardar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
