<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="rut">RUT</span>
  </div>
  <input disabled="disabled" type="text" class="form-control" value="{{$alumno->rut}}" aria-describedby="rut">
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
    {{ Form::label('telefono', 'teléfono') }}
    {{ Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono']) }}
</div>

<div class="form-group">
    {{ Form::label('carrera_id', 'Carrera') }}

    {{ Form::select('carrera_id', \App\Carrera::pluck('nombre','id'), null, ['placeholder' => 'Elegir una carrera','class' => 'form-control', 'id' => 'carrera_id']) }}
</div>

<div class="form-group">
    {{ Form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary']) }}
</div>