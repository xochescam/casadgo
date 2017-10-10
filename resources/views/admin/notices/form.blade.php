  <div class="form-group">
    {!! Form::label('title', 'Título:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('description', 'Descripción:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('date', 'Fecha:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      {!! Form::date('date', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <h4 class="">Imagenes</h4>

  <div class="form-group">
    {!! Form::label('img', 'Seleccionar:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      <input type="file" id="img[]" name="img[]" multiple>
      <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div>
  </div>

  <h4 class="">Videos</h4>
    <div class="form-group" id="videos-container">
      {!! Form::label('videos', 'Ingresar:',['class' => 'col-sm-2 col-form-label']) !!}

        <div class="col-sm-10 align-self-end float-right item-video">
          {!! Form::textarea('videos[]', null, ['class' => 'form-control','rows' => 2]) !!}
        </div>
    </div>

  <div class="col-sm-10 align-self-end float-right">
    <a id="add-video-btn"><i class="fa fa-plus"></i>Ingresar otro video</a>
    <small class="small-alert none"><b> Ha llegado al limite de videos</b></small>
  </div>

  <div class="text-center med-margin-top">
    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
  </div>

