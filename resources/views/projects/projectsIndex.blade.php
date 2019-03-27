{{--@extends('layouts.tabler')--}}
{{--@section('contenido')--}}
<div class="page-header">
    <div class="page-title">
        Listado de Projectos
    </div>
</div>

<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de Projectos</h3>
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de termino</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->start_date }}</td>
                            <td>{{ $project->end_date }}</td>
                            {{-- <td>
                                <a href="{{ route('dependencias.show', $dep->id) }}">Detalle</a>
                            </td> --}}
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>

{{--@endsection--}}