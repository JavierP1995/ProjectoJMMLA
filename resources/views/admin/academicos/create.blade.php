@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('aa'))
                <div class="alert alert-info">
                    {{ session('aa') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Registrar Academico
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
                    {!! Form::open(['route' => 'academicos.store']) !!}

                        @include('admin.academicos.partials.form')

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

<script>
function formateaRut(rut) {
    var find = ' ';
    var re = new RegExp(find, 'g');
    var actual = rut.replace(re,'');
    var actual = actual.replace('K','k');
 
    if (actual != '' && actual.length > 1) {
        var sinPuntos = actual.replace(/\./g,'');
        var actualLimpio = sinPuntos.replace('-', '');
        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
        var rutPuntos = '';
        var i = 0;
        var j = 1;
        for (i = inicio.length - 1; i >= 0; i--) {
            var letra = inicio.charAt(i);
            rutPuntos = letra + rutPuntos;
            if (j % 3 == 0 && j <= inicio.length - 1) {
                rutPuntos = "." + rutPuntos;
            }
            j++;
        }
        var dv = actualLimpio.substring(actualLimpio.length - 1);
        rutPuntos = rutPuntos + "-" + dv;
    }
    if(rutPuntos){
        document.getElementById("rut").value = rutPuntos;
    }
}
</script>

@endsection