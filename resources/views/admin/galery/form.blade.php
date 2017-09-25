  <div class="form-group">
    {!! Form::label('name', 'Nombre:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('description', 'Descripción:',['class' => 'col-sm-2 col-form-label']) !!} 
    <div class="col-sm-10">
      {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
      <small class="form-text text-muted">Opcional</small>
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('img', 'Seleccionar:',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
      <input type="file" id="img[]" name="img[]" multiple>
      <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div>
  </div>
    
  <div class="text-center med-margin-top">
    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
  </div>  
  
