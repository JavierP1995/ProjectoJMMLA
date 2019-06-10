@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('at'))
            <div class="alert alert-info">
                <button type="button float-right" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('at') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Registrar Tipo de Actividad de Titulación
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
                    {!! Form::open(['route' => 'tiposActividad.store']) !!}

                        @include('admin.tipoactividad.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.setTimeout(function() {
    $(".alert-info").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2700);
</script>

@endsection