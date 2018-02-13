@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Galeria')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'blog')
@section('class', 'more-galery')

@section('content')

  <section class="custom_section">
    <div class="container">
      <div class="section-header">
          <h1 class="section-title text-center wow fadeInDown">Galeria</h2>
      </div>

      <div class="row">
       @foreach($galery as $item)

          <div class="col-lg-3 col-md-3 col-xs-3 padding-30 padding-b-30">
              <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                  <article>
                      <div class="entry-header">
                          <div class="entry-thumbnail entry-thumbnail--main">
                              <img class="img-responsive" src="{{ url($item->media[0]->url.'thumb-'.$item->media[0]->name) }}" alt="">

                              <span class="post-format post-format-{{ $item->media[0]->type = 'img' ? 'galery' : 'video' }} "><i class="fa {{ $item->media[0]->type = 'img' ? 'fa-picture-o' : 'fa-film'  }}"></i></span>
                          </div>
                      </div>

                      <div class="entry-content">
                          <div class="entry-date">{{ \Carbon\Carbon::parse($item->date)->diffForHumans() }}</div>
                          <h2 class="entry-title"><a href="{{ route('galeria.show',$item->id) }}">{{ $item->title }}</a></h2>
                          <a class="btn btn-primary" href="{{ route('galeria.show',$item->id) }}">Ver Más</a>
                      </div>

                  </article>
              </div>
          </div>

      @endforeach 


      </div>

    </div>
    
  </section>

@endsection