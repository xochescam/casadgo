@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Ver')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'galery-show-item')
@section('class', 'galery-show-item')

@section('content')
  <div class="container">
    <div class="row row--margin">
      <h2 class="p-t text-center"> {{ $item['title'] }} </h2>
      <hr class="mb-5">

      @if(isset($item['items']['img']))
        <div class="form med-margin-bottom">
          <h4>Imagenes</h4>
          <hr>

          @foreach($item['items']['img'] as $img)

          <div>
            {{-- <img src="{{ url($img['url'].'/thumb-'.$img['name']) }}" alt=""> --}}
          </div>
            
          @endforeach
        </div>
      @endif

      @if(isset($item['items']['video']))
        <div class="form">
          <h4>Videos</h4>
          <hr>

          @foreach($item['items']['video'] as $video)
          {{-- <iframe width="1280" height="541" src="{{ url($img['url']) }}" frameborder="0" allowfullscreen></iframe> --}}
          @endforeach

        </div>
      @endif

    </div>
  </div>
@endsection
