  <div class="form-group">
    {!! Form::label('title', 'Título:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('title',isset($notice) ? $notice->title : null, ['class' => 'form-control', 'maxlength' => 85]) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('description', 'Descripción:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      {!! Form::textarea('description', isset($notice) ? $notice->description : null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('date', 'Fecha:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      {!! Form::date('date', isset($notice) ? $notice->date : null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <h4 class="">Imagenes <small>(Opcional)</small></h4>
  <div class="form-group">
    <div class="col-sm-10 align-self-end float-right">
      @if(isset($type['img']))
        @foreach($type['img'] as $key => $img)
        <div class="img-container">
          <a href="{{ route('noticias.delete.item',$img->id) }}" class="delete-img fa fa-plus fa-rotate-42"></a>
            <img src="{{ url($img->url.'thumb-'.$img->name) }}" alt="">
        </div>
          
        @endforeach
      @endif
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('img', isset($notice) ? 'Agregar:' : 'Seleccionar:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      <input type="file" id="img[]" name="img[]" multiple="true">
      <small class="form-text text-muted">Seleccione únicamente imagenes con formato .jpg, .jpeg, y .png</small>
    </div>
  </div>

  <h4 class="">Videos <small>(Opcional)</small></h4>

  <div id="videos-container">

  @if(isset($type['video']))
    @foreach($type['video'] as $key => $video)
      <div class="form-group">
       {!! Form::label('videos',($key + 1).'.',['class' => 'col-sm-2 text-right']) !!}
        <div class="col-sm-10 align-self-end float-right item-video">
          {!! Form::textarea('videos[]', 'https://www.youtube.com/watch?v='.$video->url, ['class' => 'form-control col-sm-10','rows' => 1]) !!}
          <a class="delete-item-video"=><i class="fa fa-plus fa-rotate-42"></i></a>
        </div>
      </div> 
    @endforeach
  @else
    <div class="form-group">
       {!! Form::label('videos', '1.',['class' => 'col-sm-2 text-right']) !!}
        <div class="col-sm-10 align-self-end float-right item-video">
          {!! Form::textarea('videos[]', null, ['class' => 'form-control col-sm-10','rows' => 1]) !!}
          <a class="delete-item-video"=><i class="fa fa-plus fa-rotate-42"></i></a>
        </div>
      </div> 
  @endif
  </div>

  <div class="col-sm-10 align-self-end float-right">
    <a id="add-video-btn" class="add-video"><i class="fa fa-plus"></i>Ingresar otro video</a>
    <small class="small-alert none"><b> Ha llegado al limite de videos</b></small>
  </div>

  <div class="text-center med-margin-top">
    <button type="submit" class="btn btn-primary btn-lg js-save-notice" data-csrf="{{ csrf_token() }}" data-method="{{ isset($notice) ? 'PUT' : 'POST' }}" data-notice="{{ isset($notice) ? '/'.$notice->id : '' }}">Guardar <span class="fa fa-spinner fa-spin hidden"></span></button>
  </div>

