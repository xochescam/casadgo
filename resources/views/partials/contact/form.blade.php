<div class="form-group">
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombre', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'Correo electrónico', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::text('subject', null, ['class' => 'form-control','placeholder' => 'Asunto', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('msj', null, ['class' => 'form-control','placeholder' => 'Mensaje', 'required']) !!}
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary btn-lg">Enviar Mensaje</button>
</div> 