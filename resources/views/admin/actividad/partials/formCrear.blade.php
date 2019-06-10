
<div class="row">
    <div class="col">
        <a href="{{ route('alumnos.create') }}" class="btn btn-outline-secondary">Crear Nuevo alumno en la Base de datos</a>
    </div>
    <div class="col">
        <a href="{{ route('academicos.create') }}" class="btn btn-outline-secondary">Crear Nuevo academico en la Base de datos</a>
    </div>
</div> 
<br>

<div class="form-group">
    {{ Form::label('nombre', 'Título') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<div class="form-group">
    {{ Form::label('tipoActividad_id', 'Tipo de Trabajo de Titulación') }}

    {{ Form::select('tipoActividad_id', \App\TipoActividadTitulacion::where('disponible','SI')->pluck('nombre','id'), null, 
    ['class' => 'form-control', 'id' => 'tipoActividad_id']) }}
</div>

<div class="form-group" id = "organizaciones">
        {{ Form::label('org_id', 'Organización Externa') }}

        {{ Form::select('org_id', \App\OrganizacionExterna::pluck('nombre','id'), null, 
        ['class' => 'form-control', 'id' => 'org_id']) }}    

</div>

<div class="form-group" id = "tutores">
        <label for="">Tutor</label>
        <select name="tutor_id" id="tutor_id" class="form-control input-sm tutores">
            <option value="" ></option>
        
        </select>
        
</div>


<a href="#" class="btn btn-sm btn-primary btn-add-more-estudiante">Agregar Estudiante</a>
<div class="row form-group estudiante-select-container">
    <div class="col" >
        {{ Form::select('alumno_id[]',$alumnos,null,['class'=> 'form-control']) }}
    </div>
    <div class="col">
        <a href="#" class="btn btn-sm btn-danger btn-remove">Eliminar</a>
    </div>
</div>
<div class="aux1">
</div>

<br>
<a href="#" class="btn btn-sm btn-primary btn-add-more-academico">Agregar Profesor Guia</a>
<div class="contenedor-profesores" id="contenedor-profesores">
    <div class="row form-group academico-select-container">
            <div class="col">
                {{ Form::select('academico_id[]',$academicos,null,['class'=> 'form-control']) }}
            </div>
            <div class="col">
                <a href="#" class="btn btn-sm btn-danger btn-remove2">Eliminar</a>
            </div>
    </div>
</div> 
<div class="aux2">
</div>


<div class="row ">
    <div class="col">
        <div class="form-group">
            {{ Form::label('inicio', 'Fecha Inicio:') }}
            {{ Form::date('inicio', null, ['class' => 'form-control', 'id' => 'inicio']) }}
        </div>        
    </div>
    <div class="col">
        <div class="form-group">
            {{ Form::label('termino', 'Fecha Término:') }}
            {{ Form::date('termino', null, ['class' => 'form-control', 'id' => 'termino']) }}
        </div>
    </div>
</div>







<div class="form-group">
<br>
    {{ Form::submit('Registrar', ['class' => 'btn btn-sm btn-primary', 'id' => 'enviar_titulacion']) }}
</div>