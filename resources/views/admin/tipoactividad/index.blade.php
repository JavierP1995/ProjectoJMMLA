@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @if (session()->has('dt'))
            <div class="alert alert-danger">
                <button type="button float-right" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('dt') }}
            </div>
            @elseif (session()->has('et'))
            <div class="alert alert-info">
                <button type="button float-right" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('et') }}
            </div>  
            @endif
            <div class="card">
                <div class="card-header">
                    Tipos de Actividad de Titulación 
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
                    @if (session()->has('message'))
                    <div class="alert alert-warning">
                        {{ session('message') }}
                    </div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="1px">Identificador</th>                               
                                <th width="1px">Nombre</th>
                                <th width="1px">Cantidad Estudiantes</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipos as $tipo)
                            <tr>
                                <td width="140px">{{ $tipo->id }}</td>
                                <td width="140px">{{ $tipo->nombre }}</td>
                                <td width="140px">{{ $tipo->cantMax }}</td>
                                <td width="1px">
                                    <a href="{{ route('tiposActividad.edit', $tipo->id) }}" class="btn btn-primary float-right">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['tiposActividad.destroy', $tipo->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-danger float-right" onclick="return confirm('¿Seguro que desea eliminar?')" >
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>     	

                    {{ $tipos->render() }}
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

