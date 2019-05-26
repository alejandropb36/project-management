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

            <h3 class="box-title">Listado de tareas</h3>
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
            {{-- <div class="pull-right">
              <a href="{{route('homeworks.create')}}"><button class="btn btn-success"><i class="fas fa-file-text"></i> Nuevo tarea</button></a>
            </div> --}}
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
                  {{$homeworks->links()}}
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
