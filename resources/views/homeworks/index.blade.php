@extends('layouts.admin')
@section('content')
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

            <h3 class="box-title"></h3>
            <div class="pull-right">

              <a href="{{route('homeworks.create')}}"><button class="btn btn-success"><i class="fas fa-file-text"></i> Nuevo tarea</button></a>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <main class="py-4">

                <div class="table-responsive">
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
                                  <td>
                                      <a href=" {{route('homeworks.show', $homework->id)}} "> <button class="btn btn-info">Detalle</button> </a>
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
    </div>
  </section>
</div>
@endsection
