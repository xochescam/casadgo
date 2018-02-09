<div class="col-md-10 form container-media">
    <h4>Videos</h4>
    <hr>

    @foreach($item['items']['video'] as $video)

        <div class="col-lg-6 col-sm-12 col-xs-12">
          <iframe class="mb-4" width="430" height="240" src="https://www.youtube-nocookie.com/embed/{{ $video['url'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        
    @endforeach
</div>