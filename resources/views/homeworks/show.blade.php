@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Tareas
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#">Tareas</a></li>
      <li class="active">Detalle de tarea</li>
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
            <!-- name box-->
            <h3 class="box-title">{{ $homework->name }}</h3>
            <div class="pull-right">
              <!-- button -->
              <!-- <a href="{{route('projects.create')}}"><button class="btn btn-success"><i class="fas fa-file-text"></i> Nuevo Proyecto</button></a> -->
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
                                <th>Descripción</th>
                                <th>Estatus</th>
                                <th>Documento</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de termino</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ $homework->id }} </td>
                                <td> {{ $homework->name }} </td>
                                <td> {{ $homework->description }} </td>
                                <td> {{ $homework->status }} </td>
                                <td> {{ $homework->document }} </td>
                                <td> {{ $homework->start_date }} </td>
                                <td> {{ $homework->end_date }} </td>
                                <td>
                                  <form action=" {{ route('homeworks.destroy', $homework->id) }}" method="POST">
                                    <a href=" {{ route('homeworks.edit', $homework->id) }} "> <button type="button" class="btn btn-warning"><i class="fas fa-pencil-square"></i> </button> </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> </button>
                                    </form>


                                </td>

                            </tr>
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
