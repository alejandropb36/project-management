@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-sd-10 col-xs-10 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Proyecto {{$project->name}} </h3>
            {{-- <a href="{{route('projects.create')}}">
                <button class="btn btn-success">Nuevo</button>
            </a> --}}
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estatus</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de termino</th>
                        <th>Opciones</th>
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
                        <td>
                            <a href=" {{ route('projects.edit', $project->id) }} "> <button class="btn btn-warning">Editar</button> </a>
                            {{-- Para eliminar utilizando los metodos HTTP correctamente
                                Se hace lo siguiente --}}
                            <form action=" {{ route('projects.destroy', $project->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                        
                    </tr>
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>
@endsection