    <section id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Noticias</h2>
                <p class="text-center wow fadeInDown">Somos una asociación civil proactiva siempre buscando la oportunidad de involucrar a la sociedad de Durango, en el ayudar a otros. Creemos que todos podemos aportar algo a favor de quien se encuentra en necesidad.</p>
            </div>

            <div class="row">

            @foreach($notices as $notice)
                <div class="col-lg-3 col-md-3 col-xs-3 padding-30">
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
                </div><!--/.col-sm-6-->

            @endforeach

                <div class="text-right show-more">
                    <a class="btn btn-primary" href="{{ url('/noticias') }}">Ver Más</a>
                </div>   
            </div>
        </div>
    </section>