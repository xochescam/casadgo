@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Iniciar sesión')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'login-module')
@section('class', 'login-module')

@section('content')

    <div class="container">
        <div class="row row--margin">
            <h2 class="text-center">Iniciar sesión</h2>
            <hr>

            <div class="col-md-6 col-md-offset-3">

                <div class='alert_container--login'>
                    @include('alerts.error')
                    @include('alerts.success')
                    @include('alerts.warning')
                </div>
                

                {!! Form::open(['url' => 'iniciar-sesion', 'method' => 'POST', 'class' => 'form-login']) !!}
                    
                    <div class="form-group">
                        {!! Form::label('email', 'Correo electrónico:'); !!}
                        {!! Form::email('email', null, ['placeholder' => 'correo@ejemplo.com', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('password', 'Contraseña:'); !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Acceder</button>

                    <div class="text-center min-margin-top">
                      <a href="{{ url('') }}" >¿Olvidó su contraseña?</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>  
    </div>

  
@endsection