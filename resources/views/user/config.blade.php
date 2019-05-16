@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>Perfil de usuario
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
        @endif
        <div class="box box-primary">
          <div class="box-header with-border">
            <!-- name box-->
            <h3 class="box-title">Configuracion de mi Perfil</h3>
            <div class="pull-right">
              <!-- button -->
              <!-- <a href="{{route('projects.create')}}"><button class="btn btn-success"><i class="fas fa-file-text"></i> Nuevo Proyecto</button></a> -->
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <main class="py-4">

                  <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" aria-label="Configuracion de mi usuario">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>

                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                          <div class="col-md-6">
                              <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ Auth::user()->surname }}" required autofocus>

                              @if ($errors->has('surname'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('surname') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>

                          <div class="col-md-6">
                              <input id="nick" type="text" class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick" value="{{ Auth::user()->nick }}" required autofocus>

                              @if ($errors->has('nick'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('nick') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                          <div class="col-md-6">
                            @if(Auth::user()->image)
                                    <img width="200" height="100" src=" {{ route('user.avatar', ['filename' => Auth::user()->image])}} " alt="Avatar de usuario" >
                            @else
                                <img width="200" height="100" src="https://www.assetworks.com/wp-content/uploads/2016/10/businessman.png">
                            @endif

                              <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image">

                              @if ($errors->has('image'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('image') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Guardar cambios
                              </button>
                          </div>
                      </div>
                  </form>

                </main>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
