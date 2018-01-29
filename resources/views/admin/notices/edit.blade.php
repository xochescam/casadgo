@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Editar noticia')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'notice-edit')
@section('class', 'admin notice-edit')

@section('content')

    <div class="container">
        <div class="row row--margin">
            <div class="section-header">
                <h1 class="section-title text-center">Editar</h1>
            </div>
            <div class="col-md-8">


                @include('alerts.success')
                @include('alerts.error')
                @include('alerts.warning')

                {!! Form::open([ 'method' => 'POST', 'class' => 'form-horizontal', 'files' => 'true']) !!}

                    @include('admin.notices.form')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection