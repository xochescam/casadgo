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
                

                {!! Form::open(['url'=>['cambiar-contrasena',Auth::user()->id], 'method' => 'POST', 'class' => 'form-login']) !!}
                    
                    <div class="form-group">
                        {!! Form::label('current_pass', 'Contraseña actual:',['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                          {!! Form::password('current_pass', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('new_pass', 'Nueva contraseña:',['class' => 'col-sm-2 col-form-label']) !!} 
                        <div class="col-sm-10">
                          {!! Form::password('new_pass', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('confirm_new_pass', 'Confirmar nueva contraseña:',['class' => 'col-sm-2 col-form-label']) !!} 
                        <div class="col-sm-10">
                          {!! Form::password('confirm_new_pass', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                        
                    <div class="text-center med-margin-top">
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>  
  
                {!! Form::close() !!}
            </div>
        </div>  
    </div>

  
@endsection