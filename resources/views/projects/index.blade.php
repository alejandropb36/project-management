@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-sd-10 col-xs-10 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de Proyectos</h3>
            <a href="{{route('projects.create')}}">
                <button class="btn btn-success">Nuevo</button>
            </a>
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        {{-- <th>Descripción</th> --}}
                        <th>Estatus</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td> {{ $project->id }} </td>
                            <td> {{ $project->name }} </td>
                            {{-- <td> {{ $project->description }} </td> --}}
                            <td> {{ $project->status }} </td>
                            {{-- <td> {{ $project->start_date }} </td>
                            <td> {{ $project->end_date }} </td> --}}
                            <td>
                                <a href=" {{route('projects.show', $project->id)}} "> <button class="btn btn-info">Detalle</button> </a>
                                {{-- <a href="#"> <button class="btn btn-warning">Editar</button> </a>
                                <a href="#"> <button class="btn btn-danger">Eliminar</button> </a>
                                <a href="{{ route('dependencias.show', $dep->id) }}">Detalle</a> --}}
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