<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Proyectos Index</title>
</head>
<body>
<!-- ##################################################### -->
{{--@section('contenido')--}}
<div class="page-header" >
    <div class="page-title col-lg-10 col-md-10 col-sd-10 col-xs-10 ">
        Listado de Proyectos
    </div>
</div>

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
                        <th>Descripción</th>
                        <th>Estatus</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de termino</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td> {{ $project->id }} </td>
                            <td> {{ $project->name }} </td>
                            <td> {{ $project->description }} </td>
                            <td> {{ $project->status }} </td>
                            <td> {{ $project->start_date }} </td>
                            <td> {{ $project->end_date }} </td>
                            <td>
                                <a href="#"> <button class="btn btn-info">Mostrar</button> </a>
                                <a href="#"> <button class="btn btn-warning">Editar</button> </a>
                                <a href="#"> <button class="btn btn-danger">Eliminar</button> </a>
                                {{-- <a href="{{ route('dependencias.show', $dep->id) }}">Detalle</a> --}}
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>


{{--@endsection--}}

<!-- ##################################################### -->

</body>
</html>

