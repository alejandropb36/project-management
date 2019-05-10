<div class="row">
    <div class="col-lg-6 col-md-6 col-sd-6 col-xs-6 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users </h3>
            
            {{-- @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif --}}
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        @if ($user_role == 'Lider')
                            <th>Opciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($project->users as $user)
                    <tr>
                        
                        <td> {{ $user->id }} </td>
                        <td>
                            @if($user->image)
                                <div class="container-avatar">
                                    <img src=" {{ route('user.avatar', ['filename' => $user->image])}} " alt="Avatar de usuario" class="avatar">
                                </div>
                            @endif
                        </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->pivot->user_role }} </td>
                        @if($user_role == "Lider")
                            <td>
                                <a href=" {{ route('projects.editUserRole', ['project' => $project, 'user' => $user]) }} "> <button class="btn btn-warning">Editar</button> </a>
                                

                                {{-- Para eliminar utilizando los metodos HTTP correctamente
                                    Se hace lo siguiente, esto queda temporalmente comentado ya que no se necesita --}}
                                {{-- <form action=" {{ route('projects.destroy', $project->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form> --}}
                            </td>
                        @endif
                        
                        
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>