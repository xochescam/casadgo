  <div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('text', 'Texto:') !!} <small>(Opcional)</small>
    {!! Form::text('text', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('date', 'Fecha:') !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::select('type', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('video', 'Video:') !!}
    {!! Form::text('video', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('img', 'Imagen:') !!}
    {!! Form::file('img', null, ['class' => 'form-control']) !!}
  </div>

  <button type="submit" class="btn btn-primary">Subir</button>