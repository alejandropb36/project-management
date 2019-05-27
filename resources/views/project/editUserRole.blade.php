<!-- Misael -->
@extends('layouts.admin')
@section('content')
<div class="content-wrapper">

  <section class="content-header">
    <h1><i class="fas fa-pencil-square-o"></i>Modificacion de permisos</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-Home"></i> Home</a></li>
      <li><a href="#">Detalle de proyecto</a></li>
      <li class="active">Edicion rol usuario</li>
      @if (session('message'))
      <div class="alert alert-danger">
        {{ session('message') }}
      </div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
    </ol>
  </section>
  <section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Cambios de permisos a usuario en: {{ $project->name }}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form  class="form-horizontal"action=" {{ route('projects.updateUserRole') }} " method="POST" >
                  @csrf

                  <div class="form-group " hidden>
                      <input type="text" class="form-control" name="project_id" value="{{ $project->id }} ">
                  </div>

                  <div class="form-group " hidden>
                    <input type="text" class="form-control" name="user_id" value="{{ $user->id }} ">
                  </div>

                  <div class="form-group ">
                      <label class="col-sm-4 control-label">Usuario</label>
                      <div class="col-sm-8">
                        <input class="form-control" type="text" value="{{$user->name}}" disabled>
                      </div>
                  </div>

                  <div class="form-group ">
                      <label class="col-sm-4 control-label">Rol actual</label>
                      <div class="col-sm-8">
                        <input class="form-control" type="text" value="{{$user_role}}" disabled>
                      </div>
                  </div>

                  <div class="form-group ">
                      <label class="col-sm-4 control-label">Rol a asignar</label>
                      <div class="col-sm-8">
                        <select name="user_role"  class="form-control">
                            <option value="Colaborador">Colaborador</option>
                            <option value="Lider">Lider</option>
                        </select>
                      </div>
                  </div>

              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3"></div>
          </div>
          <div class="box-footer">
            <button class="btn btn-primary ml-auto pull-right" type="submit">Guardar</button>
        </form>
        </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>

@endsection

<!--

    <div class="page-header">
        <div class="page-title">
            Editar rol de usuario en el proyecto :   {{ $project->name }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sd-11 col-xs-11 ">
            <div class="card">
                <div class="card-header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action=" {{ route('projects.updateUserRole') }} " method="POST" >
                        @csrf

                        <div class="form-group " hidden>
                            <input type="text" class="form-control" name="project_id"
                                value="{{ $project->id }} ">
                        </div>

                        <div class="form-group " >
                            <label class="form-label" >{{ $user->id . ' - ' . $user->name . ' - ' . $user_role }}</label>
                        </div>

                        <div class="form-group " hidden>
                            <input type="text" class="form-control" name="user_id"
                                value="{{ $user->id }} ">
                        </div>

                        <div class="form-group ">
                            <label class="form-label">Rol</label>
                            <select name="user_role"  class="form-control">
                                <option value="Colaborador">Colaborador</option>
                                <option value="Lider">Lider</option>
                            </select>
                        </div>

                        <button class="btn btn-primary ml-auto" type="submit">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div> -->
