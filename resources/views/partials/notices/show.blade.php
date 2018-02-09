@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Noticias')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'notices-show')
@section('class', 'notices-show')

@section('content')
<div class="container">
    <div class="row row--margin ">
      <div class="section-header">
        <h1 class="section-title text-center">{{ $item['title'] }}</h1>
        
        <div class="col-md-10 container-media text-left">
        	<p>Por: C.A.S.A.</p>
        </div>
        
      </div> 

	<div class="col-md-10 container-media text-left">
		<p> <?php echo nl2br($item['description']); ?> </p>

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
{{--   
  <div class="container">
    <div class="row row--margin">
      <div class="section-header">
        <h1 class="section-title text-center">{{ $item['title'] }}</h1>
      </div> 

          @include('partials.notices.item')

      @if(isset($item['items']['img']))
        @include('partials.galery.img')
      @endif

      @if(isset($item['items']['video']))
        @include('partials.galery.video')
      @endif

    </div>
  </div>



    @include('partials.galery.modal') --}}
    
@endsection

