@extends('layouts.app')

@section('content')
<div class="container">
    <h1><strong>Menu Principal</strong></h1>
    <hr>
    <div class="row">
        @if(Auth::user()->type>1)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Administrar Estudiantes</h5>
                    <p class="card-text">Registre, edite, recupere y elimine estudiantes de una manera sencilla aqui.</p>
                    <a href= "{{ route('alumnos.create') }}" class="btn btn-primary">Registrar</a --><!-- cardtext creando un boton de color azul con el nombre que me lleva x ruta  -->
                    <a href= "{{ route('alumnos.index')}}" class="btn btn-primary">Editar</a>
                    <a href= "{{ route('alumnos.index') }}" class="btn btn-primary">Eliminar</a>
                    <a href= "{{ route('recuperar_alumno') }}" class="btn btn-primary">Recuperar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Administrar Académicos</h5>
                    <p class="card-text">Registre, edite, recupere y elimine académicos de una manera sencilla aqui.</p>
                    <a href= "{{ route('academicos.create') }}" class="btn btn-primary">Registrar</a>
                    <a href= "{{ route('academicos.index') }}" class="btn btn-primary">Editar</a>  
                    <a href= "{{ route('academicos.index') }}" class="btn btn-primary">Eliminar</a>
                    <a href= "{{ route('recuperar_academico') }}" class="btn btn-primary">Recuperar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Administrar Tipos de Actividad de Titulación</h5>
                    <p class="card-text">Registre, edite, recupere y elimine tipos de actividad de titulación de una manera sencilla aqui.</p>
                    <a href= "{{ route('tiposActividad.create') }}" class="btn btn-primary">Registrar</a>
                    <a href= "{{ route('tiposActividad.index') }}" class="btn btn-primary">Editar</a>  
                    <a href= "{{ route('tiposActividad.index') }}" class="btn btn-primary">Eliminar</a>
                    <a href= "{{ route('recuperar_tipo') }}" class="btn btn-primary">Recuperar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Inscribir Trabajo de Titulación</h5>
                    <p class="card-text">Inscribir un trabajo de titulación, adjuntando a los estudiantes y académicos necesarios.</p>
                    <a href= "{{ route('trabajo.create') }}" class="btn btn-primary">Registrar</a>
                    <a href= "{{ route('trabajo.index') }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
        <!--En construccion 
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registrar Inscripción Formal</h5>
                    <p class="card-text">Asigna un número de inscripción entregado por registro curricular a un trabajo aceptado.</p>
                    <a href= "{{ route('inscripcion-formal') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registar Examen de Título</h5>
                    <p class="card-text">Guarda la nota y fecha del examen de un trabajo de títulación, además éste quedará como finalizado.</p>
                    <a href= "{{ route('registrar-examen') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Anular Trabajo de Titulación</h5>
                    <p class="card-text">Anula la actividad de titulación, quitandola de los registros visibles.</p>
                    <a href= "{{ route('anular-trabajo') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
        @endif
        @if(Auth::user()->type>2)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Autorizar Trabajo de Titulación</h5>
                    <p class="card-text">Asignar comisión correctora a un trabajo de titulación.</p>
                    <a href= "{{ route('autorizar-trabajo') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
        @endif
        @if(Auth::user()->type>0)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Consultar Trabajos de Titulación Vigentes</h5>
                    <p class="card-text">Revisa los trabajos existentes, con capacidad de filtro y la opcion de imprimir.</p>
                    <a href= "{{ route('principal') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
        -->
        @endif
    </div>
</div>

@endsection