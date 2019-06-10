@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <strong>Editar Alumno</strong>
                <a href= "{{ route('alumnos.index') }}" class="btn btn-sm btn-secondary float-right">Atrás</a>
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
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif
                    {!! Form::model($alumno,['route' => 
                    ['alumnos.update',$alumno->id],'method' => 'PUT']) !!}

                    @include('admin.alumnos.partials.form2')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

