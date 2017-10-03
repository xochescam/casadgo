@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Home')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'home')
@section('class', 'homepage')


@section('content')

	@include('partials.slider')
	@include('partials.about.section')
	@include('partials.services')
	@include('partials.notices.section')
	@include('partials.galery.section')
	@include('partials.volunters')
	@include('partials.sponsors')
	@include('partials.contact.section')
	
@endsection