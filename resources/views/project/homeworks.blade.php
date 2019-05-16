<!--  listado de tareas en proyecto -->


      <div class="box box-success">
        <div class="box-header with-border">
          <!-- name box-->
          <h3 class="box-title"><i class="fas fa-tasks"></i> Tareas</h3>
            <div class="pull-right">
              <a href="{{route('homeworks.createnp', $project->id)}}"><button class="btn btn-success"><i class="fas  fa-file-code-o"></i> Nueva tarea</button></a>
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
                            <th>Estatus</th>
                            <th>Proyecto</th>
                            <th>Usuario</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->homeworks as $homework)
                            {{-- @if($homework->user_id==Auth::user()->id) --}}
                            <tr>
                                <td> {{ $homework->id }} </td>
                                <td> {{ $homework->name }} </td>
                                <td> {{ $homework->status }} </td>
                                <td> {{ $homework->project_id }} </td>
                                <td> {{ $homework->user_id }} </td>
                                <td>
                                    <a href=" {{route('homeworks.show', $homework->id)}} "> <button class="btn btn-info btn'block"><i class="fas  fa-eye"></i></button> </a>
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
              </main>
            </div>
          </div>
        </div>
      </div>
