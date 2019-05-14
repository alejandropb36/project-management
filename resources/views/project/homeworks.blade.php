<div class="col-lg-6 col-md-6 col-sd-6 col-xs-6 ">
    <h3 class="card-title">Tareas</h3>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estatus</th>
                    {{-- <th>Proyecto</th> --}}
                    <th>Usuario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <a href="{{route('homeworks.createnp', $project->id)}}">
                        <button class="btn btn-success">Nueva</button>
                </a>
                @foreach($project->homeworks as $homework)
                    {{-- @if($homework->user_id==Auth::user()->id) --}}
                    <tr>
                        <td> {{ $homework->id }} </td>
                        <td> {{ $homework->name }} </td>
                        <td> {{ $homework->status }} </td>
                        {{-- <td> {{ $homework->project_id }} </td> --}}
                        <td> {{ $homework->user_id }} </td>
                        <td>
                            <a href=" {{route('homeworks.show', $homework->id)}} "> <button class="btn btn-info">Detalle</button> </a>
                        </td>
                    </tr>
                    {{--@else
                    <font color="red">
                        <h3 class="card-title" align="center">Ninguna Tarea Asignada</h3>
                    </font>--}}
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>