@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar Tipo de Actividad de Titulacion
                    <a href= "{{ route('tiposActividad.index') }}" class="btn btn-sm btn-secondary float-right">Atrás</a>
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
                    {!! Form::model($tipo,['route' => 
                    ['tiposActividad.update',$tipo->id],'method' => 'PUT']) !!}

                        @include('admin.tipoactividad.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

