@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Ver')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'notice-show-item')
@section('class', 'notice-show-item')

@section('content')

    @include('partials.notices.item')

	@include('partials.notices.modal')
	
@endsection

    

