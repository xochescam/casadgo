@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Ver')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'galery-show')
@section('class', 'galery-show')

@section('content')
  <div class="container">
    <div class="row row--margin ">
      <div class="section-header">
        <h1 class="section-title text-center">{{ $item['title'] }}</h1>
      </div> 

      @if(isset($item['items']['img']))
        @include('partials.galery.img')
      @endif

      @if(isset($item['items']['video']))
        @include('partials.galery.video')
      @endif
    </div>
  </div>

  @include('partials.galery.modal')
@endsection
