@extends('layouts.admin')
@section('content')
<<<<<<< HEAD:resources/views/homeworks/index.blade.php
<div class="content-wrapper">
  <section class="content-header">
    <h1>Menu Tareas
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Tareas</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
        @endif
        <div class="box box-primary">
          <div class="box-header with-border">

            <h3 class="box-title">Listado de tareas</h3>
            <div class="pull-right">

              <a href="{{route('homeworks.create')}}"><button class="btn btn-success"><i class="fas fa-file-text"></i> Nuevo tarea</button></a>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <main class="py-4">

                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Estatus</th>
                              <th>Proyecto</th>
                              <th>Usuario</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($homeworks as $homework)
                          @if($homework->user_id==Auth::user()->id)
                              <tr>
                                  <td> {{ $homework->id }} </td>
                                  <td> {{ $homework->name }} </td>
                                  <td> {{ $homework->status }} </td>
                                  <td> {{ $homework->project_id }} </td>
                                  <td> {{ $homework->user_id }} </td>
                                  <td>
                                      <a href=" {{route('homeworks.show', $homework->id)}} "> <button class="btn btn-info">Detalle</button> </a>
                                  </td>
                              </tr>
                            @endif  
                          @endforeach
                      </tbody>
                  </table>
                </div>
                </main>
              </div>
            </div>
=======
<div class="row">
    <div class="col-lg-10 col-md-10 col-sd-10 col-xs-10 ">
        <div class="card">
          <div class="card-header">
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            <h3 class="card-title">Listado de Tareas</h3>
            <div class='container'>
                <div class="row">
                    <div class="col-md-6">
                        <div class="page-header">
                            <h2>
                                <form action="{{route('homeworks.index')}}" method="GET" class="form-inline pull-right">
                                    <div class="form-group">
                                        <input type="text" name="status" class="form-control" placeholder="status">
                                    </div>
                                    <div class='form-group'>
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                    </div>
                                </form>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estatus</th>
                        <th>Proyecto</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($homeworks as $homework)
                        <tr>
                            <td> {{ $homework->id }} </td>
                            <td> {{ $homework->name }} </td>
                            <td> {{ $homework->status }} </td>
                            <td> {{ $homework->project_id }} </td>
                            <td> {{ $homework->user_id }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$homeworks->links()}}
>>>>>>> Gates-Polices:resources/views/homework/index.blade.php
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
