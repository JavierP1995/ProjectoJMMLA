<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="rut">RUT</span>
  </div>
  <input disabled="disabled" type="text" class="form-control" value="{{$academico->rut}}" aria-describedby="rut">
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
    {{ Form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary']) }}
</div>