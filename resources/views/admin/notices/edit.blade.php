@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Editar noticia')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'notice-create')
@section('class', 'admin notice-create')

@section('content')

    <div class="container container_margin--med">
        <div class="row">
            <div class="col-md-8">
                <h3>Editar noticia</h3>
                <hr>

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