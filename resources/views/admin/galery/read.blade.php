@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Galeria')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'galery-read')
@section('class', 'galery-read')

@section('content')
    
    <div class="container container_margin--med">
        <div class="card" style="width: 20rem;">
		  <img class="card-img-top" src="..." alt="Card image cap">
		  <div class="card-block">
		    <h4 class="card-title">Card title</h4>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		    <a href="#" class="btn btn-primary">Go somewhere</a>
		  </div>
		</div>
    </div>
  
@endsection