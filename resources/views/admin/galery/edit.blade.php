@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Editar foto')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'galery-edit')
@section('class', 'galery-edit')

@section('content')
    
    <div class="container container_margin--med">
        <div class="row row--margin">

            <h3 class="text-center">Editar foto</h3>
            <hr>

            <div class="col-md-8">

       {{--     @include('alerts.success')
                @include('alerts.error')
                @include('alerts.warning') --}}
                
                {!!Form::model($galery, array('url' => array('/editar-foto', $galery->id)))!!}
  
                    @include('admin.galery.form')

                {!! Form::close() !!}
  
            </div>  
        </div>
    </div>
  
@endsection