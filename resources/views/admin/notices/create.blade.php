@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Crear noticia')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'notice-create')
@section('class', 'notice-create')

@section('content')
    
    <div class="container">
        <div class="row row--margin">

            
            
            <h2 class="text-center">Crear noticia</h2>
            <hr>
                
            <div class="col-md-8 form_parent">

                @include('alerts.success')
                @include('alerts.error')
                @include('alerts.warning')
                
                {!! Form::open(['url' => 'crear-noticia',  'method' => 'POST', 'class' => 'form-horizontal form', 'files' => 'true']) !!}
                    
                    @include('admin.notices.form')

                {!! Form::close() !!}
  
            </div>  
        </div>
    </div>
  
@endsection