  <div class="form-group">
    {!! Form::label('title', 'Nombre:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group radio-group col-sm-10 align-self-end">
    <label>
      <input type="radio" name="options" class="options" value="1" checked="true">
      Imagen
    </label>
    <label>
      <input type="radio" name="options" class="options" value="0">
        Video
    </label>
  </div>

  @if(!isset($galery->media))

    <div class="form-group none" id="image-container">
      {!! Form::label('img', 'Seleccionar imagen:',['class' => 'col-sm-2 col-form-label']) !!}
      <div class="col-sm-10">
        <input type="file" id="img" name="img">
        <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
      </div>
    </div>

  @else
    <p>Ajustar tamaño de imagen</p>
    {{-- <img src="{{ '/storage'.$galery->media->url.$galery->media->name }}" alt="">--}}
  @endif

    <div class="form-group none" id="video-container">
      {!! Form::label('video', 'Ingresar codigo de video:',['class' => 'col-sm-2 col-form-label']) !!}

        <div class="col-sm-10">
          {!! Form::textarea('video', null, ['class' => 'form-control','rows' => 2]) !!}
        </div>
    </div>


  <div class="text-center med-margin-top">
    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
  </div>

