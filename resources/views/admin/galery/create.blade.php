@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Subir foto')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'galery-create')
@section('class', 'galery-create')

@section('content')
    
    <div class="container container_margin--med">
        <div class="row">
            <div class="col-md-8">
                <h3>Subir foto</h3>
                <hr>

                @include('alerts.error')
                @include('alerts.success')
                
                {!! Form::open([ 'url' => 'subir-foto', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => 'true']) !!}
                    
                    @include('admin.galery.form')

                {!! Form::close() !!}
  
            </div>  
        </div>
    </div>
  
@endsection