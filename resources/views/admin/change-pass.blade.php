@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Iniciar sesión')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'login-module')
@section('class', 'admin login-module')

@section('content')

    <div class="container">
        <div class="row row--margin">
            <h2 class="text-center">Cambiar contraseña</h2>
            <hr>

            <div class="col-md-8 form_parent">

                @include('alerts.success')
                @include('alerts.error')
                @include('alerts.warning')

                {!! Form::open(['url'=>['cambiar-contrasena',Auth::user()->id],  'method' => 'POST', 'class' => 'form-horizontal form form--change-pass', 'files' => 'true']) !!}

                      <div class="form-group">
                        {!! Form::label('current_pass', 'Contraseña actual:') !!}
                        {!! Form::password('current_pass', null, ['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        {!! Form::label('new_pass', 'Nueva contraseña:') !!}
                        {!! Form::password('new_pass', null, ['class' => 'form-control']) !!}
                      </div>

                       <div class="form-group">
                        {!! Form::label('new_pass', 'Confirmar nueva contraseña:') !!}
                        {!! Form::password('new_pass', null, ['class' => 'form-control']) !!}
                      </div>

                      <div class="text-center med-margin-top">
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                      </div>


                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection