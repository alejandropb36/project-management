<!-- detalles de un proyecto -->
@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>Información de proyecto</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="/projects">Proyectos</a></li>
      <li class="active">Información de proyecto</li>
    </ol>
    @if(session('message'))
       <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           {{ session('message') }}
       </div>
    @endif
  </section>
  <section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text"></i> {{$project->name}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <!-- /.form-group -->
              <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estatus</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de termino</th>
                              @can('opc-adm',$user_role)
                                <th>Opciones</th>
                              @endcan
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $project->id }} </td>
                            <td> {{ $project->name }} </td>
                            <td> {{ $project->description }} </td>
                            <td> {{ $project->status }} </td>
                            <td> {{ $project->start_date }} </td>
                            <td> {{ $project->end_date }} </td>
                            @can('opc-adm',$user_role)
                                <td>
                                    {{-- Esto fue parte de una prueba para comprobar el role
                                        {{$user_role}}
                                    --}}
                                    <a href=" {{ route('projects.createProjectUser', $project->id) }} "> <button class="btn btn-primary"><i class="fas fa-user-plus"></i> Agregar colaborador</button> </a>
                                    <a href=" {{ route('projects.edit', $project->id) }} "> <button class="btn btn-warning">Editar</button> </a>
                                    {{-- Para eliminar utilizando los metodos HTTP correctamente
                                        Se hace lo siguiente, esto queda temporalmente comentado ya que no se necesita --}}
                                    <form action=" {{ route('projects.destroy', $project->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
<div class="row">
  <div class="col-md-6">
    {{-- Listado de usuarios --}}
    @include('project.users')
  </div>
  <div class="col-md-6">
    {{-- Listado de tareas --}}
    @include('project.homeworks')
  </div>
</div>
</div>
@endsection
