

<div class="form-group">
    {{ Form::label('rut', 'RUT') }}
    {{ Form::text('rut', null, ['class' => 'form-control', 'id' => 'rut', 'onBlur' =>'formateaRut(this.value)']) }}
</div>

<div class="form-group">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<div class="form-group">
    {{ Form::label('correo', 'Correo electrónico') }}
    {{ Form::text('correo', null, ['class' => 'form-control', 'id' => 'correo']) }}
</div>

<div class="form-group">
    {{ Form::submit('Registrar', ['class' => 'btn btn-sm btn-primary']) }}
</div>