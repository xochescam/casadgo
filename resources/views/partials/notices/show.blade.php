@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Noticias')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'more-notices')
@section('class', 'more-notices')

@section('content')

    @include('partials.notices.item')

@endsection

    @include('partials.notices.modal')