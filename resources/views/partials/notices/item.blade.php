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

            <div class="notice-container notices-item" data-toggle="modal" data-target="#noticeModal">
                <img src="{{ url($img->url) }}" alt="{{ $img->name }}" data-title="{{ $img->name }}">
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