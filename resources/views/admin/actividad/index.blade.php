@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Trabajos de Titulación para editar
                    <td width="100px">
                        <a href= "{{ route('principal') }}" class="btn btn-sm btn-secondary float-right">Atrás</a>
                    </td> 
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
                    @if($trabajos->count() >3 || $trabajos->count()== 0)
                    <div>
                        {{ Form::open(['route' => 'trabajo.index', 'method' => 'GET', 'class' => 'form-inline float-right']) }}
                            <div class="form-group">
                                {{ Form::text('rutConsulta', null, ['placeholder' => '11.111.111-1', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    Buscar Trabajo del Estudiante
                                </button>
                            </div>
                        {{ Form::close() }}
                    </div>  
                    @endif 
                    <br>                  
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="1px">Título</th>                               
                                <th width="170px">Estudiante</th>
                                <th width="1px">Rut</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trabajos as $trabajo)
                                
                            <tr>
                                <td width="10px">{{ $trabajo->nombre }}</td>
                                <td width="10px">
                                    @foreach($trabajo->alumnos as $alumno)
                                        {{$alumno->nombre}}
                                        <br>
                                    @endforeach
                                </td>
                                <td width="1px">
                                    @foreach($trabajo->alumnos as $alumno)
                                        {{$alumno->rut}}
                                        <br>
                                    @endforeach
                                </td>
                                <td width="1px">
                                    <a href="{{ route('trabajo.edit', $trabajo->id) }}" class="btn btn-primary">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>   
                    </table>          	

                    {{ $trabajos->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>

 </script>