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
                        <td width=100>
                            <a href=" {{ route('projects.edit', $project->id) }} "> <button class="btn btn-warning"><i class="far fa-edit"></i></button> </a>{{--Editar--}}
                            {{-- Para eliminar utilizando los metodos HTTP correctamente
                                Se hace lo siguiente --}}
                            <form action=" {{ route('projects.destroy', $project->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="far fa-times-circle"></i></button>{{--Eliminar--}}
                            </form>
                        </td>                   
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<h3 class="card-title">Tareas</h3>
<div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estatus</th>
                    <th>Proyecto</th>
                    <th>Usuario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project->homeworks as $homework)
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
@endsection
