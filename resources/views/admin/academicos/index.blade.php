@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
                    @if (session()->has('da'))
                    <div class="alert alert-danger">
                        <button type="button float-right" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('da') }}
                    </div>
                    @elseif (session()->has('ea'))
                    <div class="alert alert-info">
                        <button type="button float-right" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('ea') }}
                    </div>  
                    @endif
            <div class="card">
                <div class="card-header">
                    Lista de Academicos 
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
                    @if($academicos->count() >3 || $academicos->count()== 0)
                    <div>
                        {{ Form::open(['route' => 'academicos.index', 'method' => 'GET', 'class' => 'form-inline float-right']) }}
                            <div class="form-group">
                                {{ Form::text('rutConsulta', null, ['placeholder' => '11.111.111-1', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    Buscar
                                </button>
                            </div>
                        {{ Form::close() }}
                    </div>  
                    @endif  
                    
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">RUT</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($academicos as $academico)
                            <tr>
                                <td width="170px">{{ $academico->rut }}</td>
                                <td width="280px">{{ $academico->nombre }}</td>
                                <td width="10px">
                                    <a href="{{ route('academicos.edit', $academico->id) }}" class="btn btn-primary float-right">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['academicos.destroy', $academico->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-danger float-right" onclick="return confirm('¿Seguro que desea eliminar?')">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>     	

                    {{ $academicos->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2700);
</script>

@endsection