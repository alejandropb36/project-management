
<!--Misael  -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <!-- name box-->
          <h3 class="box-title"><i class="fas fa-users"></i> Usuarios</h3>
          <div class="pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <main class="py-4">
                <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th class="text-center">Imagen</th>
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
                              <td>
                                  @if($user->image)
                                      <div class="container-avatar">
                                          <img src=" {{ route('user.avatar', ['filename' => $user->image])}} " alt="Avatar de usuario" class="avatar">
                                      </div>
                                  @else
                                  <div class="container-avatar">
                                  <img src="https://www.assetworks.com/wp-content/uploads/2016/10/businessman.png">
                                  </div>
                                  @endif
                              </td>
                              <td> {{ $user->name }} </td>
                              <td> {{ $user->email }} </td>
                              <td> {{ $user->pivot->user_role }} </td>
                              @if($user_role == "Lider")
                                  <td>
                                      <form action=" {{ route('projects.destroyProjectUser', ['project' => $project, 'user' => $user]) }}" method="POST">
                                    <a href=" {{ route('projects.editUserRole', ['project' => $project, 'user' => $user]) }} "> <button type="button" class="btn btn-warning"><i class="fas fa-pencil-square-o">  </i></button></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>

                                  </td>
                              @endif
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              </main>
            </div>
          </div>
        </div>
      </div>
