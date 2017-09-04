  <div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('description', 'Descripción:') !!} <small>(Opcional)</small>
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('img', 'Imagen:') !!}
    {!! Form::file('img', null, ['class' => 'form-control']) !!}
  </div>

  <button type="submit" class="btn btn-primary">Subir</button>