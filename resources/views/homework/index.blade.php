@extends('layouts.admin')
@section('content')
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
          </div>
        </div>
    </div>
</div>
@endsection