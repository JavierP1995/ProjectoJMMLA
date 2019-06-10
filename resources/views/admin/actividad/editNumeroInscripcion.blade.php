
@extends ('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Registrar Numero de inscripción
                </div>

                <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif

                    {!! Form::model($trabajo,['route' => 
                    ['inscripcion-formal-actualizar',$trabajo->id],'method' => 'PUT']) !!}

                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre:') }}
                        {{ Form::label('nombre2', $trabajo->nombre) }}
                    </div>
                    <div class="form-group">
                    <h5>Alumnos:</h5>
                    @foreach($trabajo->alumnos as $alumno)
                        <div>
                            {{'Nombre: '.$alumno->nombre}}
                            <br>
                            {{'RUT: '.$alumno->rut}}
                        </div>
                    @endforeach
                    </div>  
                    <div class="form-group">
                    <h5>Correctores:</h5>
                    @foreach($trabajo->correctores as $corrector)
                        <div>
                            {{'Nombre: '.$corrector->nombre}}
                            <br>
                            {{'RUT: '.$corrector->rut}}
                        </div>
                    @endforeach
                    </div>                          

                    <div class="form-group">
                        {{ Form::label('tipo', 'Tipo de actividad de titulación:') }}
                        {{ Form::label('tipo2', $trabajo->tipoActividad()->first()->nombre) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('inicio', 'Inicio:') }}
                        {{ Form::label('inicio2', $trabajo->inicio) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('termino', 'Termino:') }}
                        {{ Form::label('termino2', $trabajo->termino) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('semestre_año', 'Semestre/Año Inscripción:') }}
                        {{ Form::label('semestre_año2', $trabajo->semestre_año_inscripcion) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('numero_inscripcion', 'Número de Inscripción:') }}
                        {{ Form::text('numero_inscripcion', null, ['class' => 'form-control', 'id' => 'numero_inscripcion']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Enviar', ['class' => 'btn btn-sm btn-primary']) }}
                    </div>
                        
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection