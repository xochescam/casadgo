@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Noticias')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'more-notices')
@section('class', 'more-notices')

@section('content')

  <section class="custom_section">
    <div class="container">
      <div class="section-header">
          <h1 class="section-title text-center wow fadeInDown">
            {{ $notice->title }}
          </h2>

          <p>Por: C.A.S.A.</p>
      </div>

      <div class="row">
    
      	<div class="col-sm-9">

          <p> <?php echo nl2br($notice->description); ?> </p>

      	</div>
      	<div class="col-sm-3">

          @if(isset($type['img']))
            <h4 class="text-center">Imagenes</h4>

            @foreach($type['img'] as $img)

            <div class="notice-container" data-toggle="modal" data-target="#noticeModal">
                <img src="{{ url($img->url) }}" alt="{{ $img->name }}">
            </div>
              
            @endforeach

          @endif

          @if(isset($type['video']))
            <h4>Videos</h4>

            @foreach($type['video'] as $video)

            <div class="notice-container">
              {!! $video->url !!}
            </div>

            @endforeach

          @endif

      	</div>
      </div>

    </div>
    
  </section>

@endsection

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" id="noticeModal" role="dialog" aria-labelledby="completeNameVolunter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Titulo de la imagen</h5>
          <button type="button" class="close close__icon" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img class="img-fluid img-thumbnail" id="modalImg" src="{{ url('/images/galeria/1.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
