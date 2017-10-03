    <section id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Noticias</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article>
                            <div class="entry-header">
                                <div class="entry-thumbnail entry-thumbnail--main">

                                    @if($lastNotice->media[0]->type == 'img')
                                        
                                        <img class="img-responsive" src="{{ url($lastNotice->media[0]->url) }}" alt="">

                                    @else

                                        {!! $lastNotice->media[0]->url !!}
                                        
                                    @endif
                                    
                                    <span class="post-format post-format-{{ $lastNotice->media[0]->type = 'img' ? 'galery' : 'video' }} "><i class="fa {{ $lastNotice->media[0]->type = 'img' ? 'fa-picture-o' : 'fa-film'  }}"></i></span>

                                </div>
                                <div class="entry-date">{{ \Carbon\Carbon::parse($lastNotice->date)->diffForHumans() }}</div>
                                <h2 class="entry-title"><a href="{{ route('noticia.show',$lastNotice->id) }}">{{ $lastNotice->title }}</a></h2>
                            </div>

                            <div class="entry-content">
                                <P> <?php echo nl2br($lastNotice->description); ?> </P>
                                <a class="btn btn-primary" href="{{ route('noticia.show',$lastNotice->id) }}">Leer Más</a>
                            </div>

                        </article>
                    </div>
                </div><!--/.col-sm-6-->
                <div class="col-sm-6">

                    @foreach($notices as $notice)

                        <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                            <article class="media clearfix">
                                <div class="entry-thumbnail entry-thumbnail--default pull-left">
                                    <img class="img-responsive" src="{{ url($notice->media[0]->url) }}" alt="{{ url($notice->media[0]->name) }}">

                                      <span class="post-format post-format-{{ $notice->media[0]->type = 'img' ? 'galery' : 'video' }} "><i class="fa {{ $notice->media[0]->type = 'img' ? 'fa-picture-o' : 'fa-film'  }}"></i></span>

                                </div>
                                <div class="media-body">
                                    <div class="entry-header">
                                        <div class="entry-date"> {{ \Carbon\Carbon::parse($notice->date)->diffForHumans() }}</div>
                                        <h2 class="entry-title"><a href="{{ route('noticia.show',$notice->id) }}">{{ $notice->title }}</a></h2>
                                    </div>

                                    <div class="entry-content">
                                        <P class="ellipsis"> <?php echo nl2br($notice->description); ?> </P>
                                        <a class="btn btn-primary" href="{{ route('noticia.show',$notice->id) }}">Leer Más</a>
                                    </div>

                                </div>
                            </article>
                        </div>

                    @endforeach

                </div>

                <p class="text-right">
                    <a class="btn btn-primary" href="{{ url('/noticias') }}">Ver Más</a>
                </p>   
            </div>
        </div>
    </section>