@extends('layouts.admin')
@section('content')


<?php $npagina= "PROYECTOS"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> <li class="fas fa-list"></li> Proyectos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Proyectos</li>
      </ol>
      @if (session('message'))
          <div class="alert alert-danger">
              {{ session('message') }}
          </div>
      @endif
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Listado de proyectos</h3>
              {{-- <div class="pull-right">
                <a href="{{route('projects.create')}}"><button class="btn btn-success"><i class="fas fa-file-text"></i> Nuevo Proyecto</button></a>
              </div> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="row">
                <div class="col-md-12">
                  <main class="py-4">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead >
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="text-center">Estatus</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th>Eliminación</th>
                                <th width="70">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)

                            <tr>
                                <td> {{ $project->id }} </td>
                                <td> {{ $project->name }} </td>
                                <td> {{ $project->status }} </td>
                                <td> {{ $project->created_at }} </td>
                                <td> {{ $project->updated_at }} </td>
                                <td> {{ $project->deleted_at }} </td>
                                <td>
                                    <a href=" {{route('projects.show', $project->id)}} "> <button class="btn btn-info">Detalle</button> </a>
                                    <form action=" {{ route('projects.destroy', $project->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>

                  </main>
                </div>
              </div>
        </div>

        </div>

    </div>
    </section>
</div>
@endsection