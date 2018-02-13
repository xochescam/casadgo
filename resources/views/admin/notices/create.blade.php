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
            <div class="section-header">
                <h1 class="section-title text-center">Crear noticia</h1>
            </div>

            <div class="col-md-8 form_parent">

                <div id="alerts">
                    @include('alerts.success')
                    @include('alerts.error')
                    @include('alerts.warning')   
                </div>
    
               {!! Form::open(['route' => 'noticias.store',  'method' => 'POST', 'class' => 'form-horizontal form', 'files' => 'true', 'id' => 'save-notice']) !!}

                    @include('admin.notices.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection