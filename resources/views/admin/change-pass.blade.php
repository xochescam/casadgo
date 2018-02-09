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
          <div class="section-header">
            <h1 class="section-title text-center">Cambiar contraseña</h1>
          </div>

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
                        {!! Form::label('confirm_new_pass', 'Confirmar nueva contraseña:') !!}
                        {!! Form::password('confirm_new_pass', null, ['class' => 'form-control']) !!}
                      </div>

                      <div class="text-center med-margin-top">
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                      </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection