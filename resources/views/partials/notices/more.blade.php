@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Noticias')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'blog')
@section('class', 'home')

@section('content')

  <section class="custom_section">
    <div class="container">
      <div class="section-header">
          <h1 class="section-title text-center wow fadeInDown">Noticias</h2>
      </div>

      <div class="row">
        
        @foreach($notices as $notice)
          <div class="col-lg-3 col-md-3 col-xs-3 padding-30 padding-b-30">
              <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                  <article>
                      <div class="entry-header">
                          <div class="entry-thumbnail entry-thumbnail--main">
                              <img class="img-responsive" src="{{ url($notice->media[0]->url.'thumb-'.$notice->media[0]->name) }}" alt="">

                              <span class="post-format post-format-{{ $notice->media[0]->type = 'img' ? 'galery' : 'video' }} "><i class="fa {{ $notice->media[0]->type = 'img' ? 'fa-picture-o' : 'fa-film'  }}"></i></span>
                          </div>
                      </div>

                      <div class="entry-content">
                          <div class="entry-date">{{ \Carbon\Carbon::parse($notice->date)->diffForHumans() }}</div>
                          <h2 class="entry-title"><a href="{{ route('noticias.show',$notice->id) }}">{{ $notice->title }}</a></h2>
                          <P class="ellipsis"> <?php echo nl2br($notice->description); ?> </P>
                          <a class="btn btn-primary" href="{{ route('noticias.show',$notice->id) }}">Leer Más</a>
                      </div>

                  </article>
              </div>
          </div>
        @endforeach
      </div>

    </div>
    
  </section>

@endsection