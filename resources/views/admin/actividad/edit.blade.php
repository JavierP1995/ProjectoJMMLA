@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar Trabajo de Titulación
                    <a href= "{{ route('trabajo.index') }}" class="btn btn-sm btn-secondary float-right">Atrás</a>
                </div>

                <div class="card-body" >
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
                    ['trabajo.update',$trabajo->id],'method' => 'PUT']) !!}

                        @include('admin.actividad.partials.formEdit')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var template1 = '<div class="row form-group estudiante-select-container">'+
                        '<div class="col">'+
                            '{{ Form::select('alumno_id[]',$alumnos,null,['class'=> 'form-control']) }}'+
                        '</div>'+
                        '<div class="col">'+
                            '<a href="#" class="btn btn-sm btn-danger btn-remove">Eliminar</a>'+
                        '</div>'+
                    '</div>'
    var template2 = '<div class="row form-group academico-select-container">'+
                        '<div class="col">'+
                            '{{ Form::select('academico_id[]',$academicos,null,['class'=> 'form-control']) }}'+
                        '</div>'+
                        '<div class="col">'+
                            '<a href="#" class="btn btn-sm btn-danger btn-remove2">Eliminar</a>'+
                        '</div>'+
                    '</div>'
    var cantEstudiantes = 1;
    var cantAcademicos = 1;
    var cantMax = 1;

    $(document).ready(function(){
        var id_trabajo = $('#trabajoid').val();
        var url = "{{route('retornarDatos',':id')}}";
        url = url.replace(':id', id_trabajo);
        $.ajax({
                type:'GET',
                url: url,
                data:'_token = <?php echo csrf_token() ?>',

                success:function(data) {
                    cantEstudiantes = data.cantidadAlumnos;
                    cantAcademicos = data.cantidadGuias;
                    cantMax = data.cantidadMax;
                    if(data.orgEx == "NO"){
                        document.getElementById("org_id").value = null;
                        document.getElementById("tutor_id").value = null;
                        $('#organizaciones').hide();
                        $('#tutores').hide();
                    }
                }

        }); 
  
    });

    $('.btn-add-more-estudiante').on('click',function(e){
        e.preventDefault();
        if(cantEstudiantes<cantMax){
            $('.aux1').before(template1);
            cantEstudiantes = 1 + cantEstudiantes;
        }
        
    });

    $(document).on('click','.btn-remove',function(e){
        e.preventDefault();
        if(cantEstudiantes>1){
            $(this).parents('.estudiante-select-container').remove();
            cantEstudiantes = cantEstudiantes-1;
        }     
    });

    $('.btn-add-more-academico').on('click',function(e){
        e.preventDefault();
        if(cantAcademicos<2){
            $('.aux2').before(template2);
            cantAcademicos = 1 + cantAcademicos;
        }
    });

    $(document).on('click','.btn-remove2',function(e){
        e.preventDefault();
        if(cantAcademicos>1){
            $(this).parents('.academico-select-container').remove();
            cantAcademicos = cantAcademicos-1;
        }
    });

    $("#tipoActividad_id").change(function(e){
        var id_tipo = $(this).val();
        $('.tutores').empty();
        
        if(id_tipo!=""){
            var url = "{{route('tieneOrgEx',':id')}}";
            url = url.replace(':id', id_tipo);
            $.ajax({
                type:'GET',
                url: url,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                
                cantMax = data.cantidad;
                if(data.respuesta=="SI"){
                    $('#organizaciones').show(); 
                    $('#tutores').show();
                }else{
                    document.getElementById("org_id").value = null;
                    document.getElementById("tutor_id").value = null;
                    $('#organizaciones').hide();
                    $('#tutores').hide();
                }
                }
            });            
        }else{
            $('#organizaciones').hide();
            $('#tutores').hide();
        }
               
    });

    $("#org_id").change(function(e){
        var org_id = $(this).val();
        if(org_id!=""){
            var url = "{{route('retornarTutores',':id')}}";
            url = url.replace(':id', org_id);
            $.ajax({
                type:'GET',
                url: url,
                data:'_token = <?php echo csrf_token() ?>',

                success:function(data) {

                    $('#tutor_id').empty();
                    $.each(data,function(index, tutorObj){
                        
                        $('#tutor_id').append('<option value="'+tutorObj.id+'">'+tutorObj.nombre+'</option>');

                    });

                }
            });  
        }else{
            $('#tutor_id').empty();
        }  
    });

</script>

@endsection

