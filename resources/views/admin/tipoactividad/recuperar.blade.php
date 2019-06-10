@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @if (session()->has('rt'))
            <div class="alert alert-success">
                <button type="button float-right" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('rt') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Tipos de Actividad de Titulación recuperables
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
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="140px">Identificador Único</th>
                                <th width="140px">Nombre</th>
                                <th width="140px">Cantidad Estudiantes</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipos as $tipo)
                            <tr>
                                <td width="140px">{{ $tipo->id }}</td>
                                <td width="140px">{{ $tipo->nombre }}</td>
                                <td width="140px">{{ $tipo->cantMax }}</td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['tiposActividad.show', $tipo->id], 'method' => 'GET']) !!}
                                        <button class="btn btn-success float-right">
                                            Recuperar
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