<div class="col-md-10 form container-media">
  <h4>Imagenes</h4>
  <hr>

  @foreach($item['items']['img'] as $img)
    <div class="col-lg-3 col-sm-3 col-xs-4" data-toggle="modal" data-target="#galeryModal">
      <a href="#" class="d-block mb-4 h-100 galery-item" >
        <img class="img-fluid img-thumbnail" src="{{ url($img['url'].'thumb-'.$img['name']) }}" data-title="{{ $item['title'] }}">
      </a>
    </div>
  @endforeach
</div>