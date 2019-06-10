
<div class="row">
    <div class="col">
        <a href="{{ route('alumnos.create') }}" class="btn btn-outline-secondary">Crear Nuevo alumno en la Base de datos</a>
    </div>
    <div class="col">
        <a href="{{ route('academicos.create') }}" class="btn btn-outline-secondary">Crear Nuevo academico en la Base de datos</a>
    </div>
</div> 
<br>

<input type="hidden" id="trabajoid" name="trabajoid" value="{{ $trabajo->id }}">

<div class="form-group">
    {{ Form::label('nombre', 'Título') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<div class="form-group">
    {{ Form::label('tipoActividad_id', 'Tipo de Trabajo de Titulación') }}

    {{ Form::select('tipoActividad_id', \App\TipoActividadTitulacion::where('disponible','SI')->pluck('nombre','id'), null, 
    ['class' => 'form-control', 'id' => 'tipoActividad_id']) }}
</div>
@if($trabajo->tutor)
<div class="form-group" id = "organizaciones">
        <label for="org_id">Organización Externa</label>
        <select name="org_id" id="org_id" class="form-control input-sm ">
            @foreach ($organizaciones as $organizacion)
                @if($organizacion->id == $trabajo->tutor->org_id)
                    <option value="{{$organizacion->id}}" selected="selected">{{ $organizacion->nombre }}</option>
                @else
                    <option value="{{$organizacion->id}}">{{ $organizacion->nombre  }}</option>
                @endif
                
            @endforeach
        </select>
</div>

<div class="form-group" id="tutores">
        <label for="">Tutor</label>
        <select name="tutor_id" id="tutor_id" class="form-control input-sm tutores">
            @foreach ($tutores as $tutor)
                @php($valor = array_search( $tutor,$tutores))
                @if($tutor == $trabajo->tutor->nombre)
                    <option value={{$valor}} selected="selected">{{ $tutor }}</option>
                @else
                    <option value={{$valor}}>{{ $tutor }}</option>
                @endif
                
            @endforeach
        </select>
        
</div>
@else
<div class="form-group" id = "organizaciones">
        <label for="org_id">Organización Externa</label>
        <select name="org_id" id="org_id" class="form-control input-sm ">
            @foreach ($organizaciones as $organizacion)
                <option value="{{$organizacion->id}}">{{ $organizacion->nombre  }}</option>   
            @endforeach
        </select>
</div>

<div class="form-group" id="tutores">
        <label for="">Tutor</label>
        <select name="tutor_id" id="tutor_id" class="form-control input-sm tutores">
            @foreach ($tutores as $tutor)
                @php($valor = array_search( $tutor,$tutores))
                <option value={{$valor}}>{{ $tutor }}</option>      
            @endforeach
        </select>
        
</div>

@endif

<a href="#" class="btn btn-sm btn-primary btn-add-more-estudiante">Agregar Estudiante</a>

@foreach($trabajo->alumnos as $alumno_trabajo)
<div class="row form-group estudiante-select-container">
    <div class="col" >
        <select name="alumno_id[]" class="form-control input-sm ">
                @foreach($alumnos as $alumno)
                    @php($seleccion = $alumno_trabajo->nombre.','.$alumno_trabajo->rut)
                    @php($valor = array_search( $alumno,$alumnos))
                    @if($seleccion == $alumno)
                        <option value="{{$valor}} " selected="selected" >{{ $alumno }}</option>
                    @else
                        <option value="{{$valor}} " >{{ $alumno }}</option>
                    @endif           
                @endforeach
        </select>
    </div>
    <div class="col">
        <a href="#" class="btn btn-sm btn-danger btn-remove">Eliminar</a>
    </div>
</div>
@endforeach

<div class="aux1">
</div>

<br>
<a href="#" class="btn btn-sm btn-primary btn-add-more-academico">Agregar Profesor Guia</a>

@foreach($trabajo->guias as $guia)
<div class="contenedor-profesores" id="contenedor-profesores">
    <div class="row form-group academico-select-container">
            <div class="col">
                <select name="academico_id[]" class="form-control input-sm ">
                    @foreach($academicos as $academico)
                        @php($seleccion = $guia->nombre.','.$guia->rut)
                        @php($valor = array_search( $academico,$academicos))
                        @if($seleccion == $academico)
                            <option value="{{$valor}}" selected="selected" >{{ $academico }}</option>
                        @else
                            <option value="{{$valor}}" >{{ $academico }}</option>
                        @endif           
                    @endforeach
                </select>
            </div>
            <div class="col">
                <a href="#" class="btn btn-sm btn-danger btn-remove2">Eliminar</a>
            </div>
    </div>
</div> 
@endforeach
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
    {{ Form::submit('Editar', ['class' => 'btn btn-sm btn-primary', 'id' => 'enviar_titulacion']) }}
</div>