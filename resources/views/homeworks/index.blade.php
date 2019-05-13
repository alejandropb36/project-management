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
            <a href="{{route('homeworks.create')}}">
                <button class="btn btn-success">Nueva</button>
            </a>
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
                            <td>
                                <a href=" {{route('homeworks.show', $homework->id)}} "> <button class="btn btn-info">Detalle</button> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection