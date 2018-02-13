  <section id="portfolio">
    <div class="container">
      <div class="section-header">
          <h2 class="section-title text-center wow fadeInDown">Galería</h2>
          <p class="text-center wow fadeInDown">Esto es parte de nuestra historia, es parte de C.A.S.A.</p>
      </div>

      @foreach($galery as $item)

        <div class="col-lg-2 col-md-4 col-xs-6 galery-item" data-toggle="modal" data-target="#galeryModal">
          <a class="d-block mb-4 h-100 selected-img">
            <img class="img-fluid img-thumbnail" src="{{ url($item->url.'thumb-'.$item->name) }}" data-title="{{ $item->galery[0]->title  }}">
          </a>
        </div>

      @endforeach     
      <p class="text-right margin-top"><a class="btn btn-primary" href="{{ url('galeria') }}">Ver Más</a></p>

    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" id="galeryModal" role="dialog" aria-labelledby="completeNameVolunter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"></h5>
          <button type="button" class="close close__icon" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img class="img-fluid img-thumbnail" id="modalImg" src="" alt="">
        </div>
      </div>
    </div>
  </div>
