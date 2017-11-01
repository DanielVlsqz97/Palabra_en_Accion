@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>
                  Iniciar Sesion
                  </h1>
                </div>

                <div class="panel-body">
                    <form  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" >Correo Electronico</label>


                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingrese su Correo Electronico">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" >Contraseña</label>


                                <input id="password" type="password" class="form-control" name="password" required placeholder="Ingrese su Contraseña">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Acceder
                        </button>


                        <a class="btn btn-link" href="{{ route('password.request') }}">
                          Forgot Your Password?
                        </a>





                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
