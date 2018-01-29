@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Editar foto')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'galery-edit')
@section('class', 'admin galery-edit')

@section('content')

    <div class="container">
        <div class="row row--margin">
           <div class="section-header">
                <h1 class="section-title text-center">Editar</h1>
            </div>

            <div class="col-md-8">

       {{--     @include('alerts.success')
                @include('alerts.error')
                @include('alerts.warning') --}}

                {!!Form::model($galery, array('url' => array('/galeria', $galery->id)))!!}

                    @include('admin.galery.form')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection