<div class="form-group">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<div class="form-group">
    {{ Form::label('cantMax', 'Cantidad máxima de estudiantes') }}
    {{ Form::text('cantMax', null, ['placeholder' => 'min:1, max:5','class' => 'form-control', 'id' => 'cantMax']) }}
</div>

<div class="form-group">
    {{ Form::label('duracion', 'Duración(semestres)') }}
    {{ Form::text('duracion', null, ['placeholder' => '1 o 2','class' => 'form-control', 'id' => 'duracion']) }}
</div>

<div >
{{ Form::label('asd', '¿Requiere Organización Externa?') }}
</div>
<div class="form-group">
    {{ Form::label('organizacionExterna', 'Si') }}
    {{ Form::radio('organizacionExterna', 'SI', ['class' => 'form-control', 'id' => 'organizacionExterna']) }}
    {{ Form::label('organizacionExterna', 'No') }}
    {{ Form::radio('organizacionExterna', 'NO', ['class' => 'form-control', 'id' => 'organizacionExterna']) }}

</div>

<div class="form-group">
    {{ Form::submit('Enviar', ['class' => 'btn btn-sm btn-primary']) }}
</div>