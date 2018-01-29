@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Subir foto')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'galery-create')
@section('class', 'galery-create')

@section('content')

    <div class="container">
        <div class="row row--margin">
            <div class="section-header">
                <h1 class="section-title text-center">Crear album</h1>
            </div>

            <div class="col-md-8 form_parent">

                @include('alerts.error')
                @include('alerts.success')
                @include('alerts.warning')

                {!! Form::open([ 'url' => 'galeria', 'method' => 'POST', 'class' => 'form-horizontal form', 'files' => 'true']) !!}

                    @include('admin.galery.form')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection