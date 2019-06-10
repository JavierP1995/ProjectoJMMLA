<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

use App\Http\Requests\TrabajoTitulacionStoreRequest;
use App\Http\Requests\TrabajoTitulacionUpdateRequest;
use App\Http\Requests\InscripcionFormalRequest;
use App\Http\Requests\RegistrarExamenRequest;

use App\TipoActividadTitulacion;
use App\TrabajoTitulacion;
use App\Alumno;
use App\Academico;
use App\OrganizacionExterna;
use App\Tutor;


class TrabajoTitulacionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $trabajos = TrabajoTitulacion::whereHas('alumnos', function ($query) use ($rutConsulta) {
                $query->where('rut', 'LIKE', "$rutConsulta%");
            })
            ->where('estado','INGRESADA')
            ->paginate();
            return view('admin.actividad.index', compact('trabajos'));
        }

        $trabajos = TrabajoTitulacion::orderBy('id', 'DESC')
        ->Where('estado','INGRESADA')
        ->paginate();
        $cantidad = $trabajos->count();

        return view('admin.actividad.index', compact('trabajos'));

    }

    public function indexAutorizar(Request $request)
    {
        //Historia de Usuario: Autorizar actividad de titulación

        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $trabajos = TrabajoTitulacion::whereHas('alumnos', function ($query) use ($rutConsulta) {
                $query->where('rut', 'LIKE', "$rutConsulta%");
            })
            ->where('estado','INGRESADA')
            ->paginate();

            return view('admin.actividad.indexAutorizar', compact('trabajos'));
        }

        $trabajos = TrabajoTitulacion::orderBy('id', 'DESC')
        ->where('estado','INGRESADA')->paginate();

        return view('admin.actividad.indexAutorizar', compact('trabajos'));

    }


    public function indexInscripcionFormal(Request $request)
    {
        //Historia de Usuario: Autorizar actividad de titulación

        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $trabajos = TrabajoTitulacion::whereHas('alumnos', function ($query) use ($rutConsulta) {
                $query->where('rut', 'LIKE', "$rutConsulta%");
            })
            ->where('estado','ACEPTADA')
            ->where('numero_inscripcion','=',NULL)
            ->paginate();

            return view('admin.actividad.indexInscripcionFormal', compact('trabajos'));
        }
        
        $trabajos = TrabajoTitulacion::orderBy('id', 'DESC')
        ->where('estado','ACEPTADA')
        ->where('numero_inscripcion','=',NULL)
        ->paginate();

            return view('admin.actividad.indexInscripcionFormal', compact('trabajos'));

    }

    public function indexRegistrarExamen(Request $request)
    {
        //Historia de Usuario: Registrar examen de título

        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $trabajos = TrabajoTitulacion::whereHas('alumnos', function ($query) use ($rutConsulta) {
                $query->where('rut', 'LIKE', "$rutConsulta%");
            })
            ->where('estado','ACEPTADA')
            ->where('numero_inscripcion','!=',NULL)
            ->paginate();

            return view('admin.actividad.indexRegistrarExamen', compact('trabajos'));
        }

        $trabajos = TrabajoTitulacion::orderBy('id', 'DESC')
        ->where('estado','ACEPTADA')
        ->where('numero_inscripcion','!=',NULL)
        ->paginate();

        return view('admin.actividad.indexRegistrarExamen', compact('trabajos'));

    }

    public function indexAnularTrabajo(Request $request)
    {
        //Historia de Usuario: Anular actividad de titulación

        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $trabajos = TrabajoTitulacion::whereIn('estado', ['ACEPTADA','INGRESADA'])
            ->whereHas('alumnos', function ($query) use ($rutConsulta) {
                $query->where('rut', 'LIKE', "$rutConsulta%");
            })
            ->paginate();

            return view('admin.actividad.indexAnularTrabajo', compact('trabajos'));
        }

        $trabajos = TrabajoTitulacion::orderBy('id', 'DESC')
        ->where('estado','INGRESADA')
        ->orWhere('estado','ACEPTADA')
        ->paginate();

        return view('admin.actividad.indexAnularTrabajo', compact('trabajos'));

    }

    

    public function create()
    {
        $alumnos= []; 
        $academicos= [];
        foreach(Alumno::orderBy('rut','asc')->where('disponible','SI')->get() as $alumno):
            $alumnos[$alumno->id] = $alumno->nombre.','.$alumno->rut;
        endforeach;
        foreach(Academico::orderBy('rut','asc')->where('disponible','SI')->get() as $academico):
            $academicos[$academico->id] = $academico->nombre.','.$academico->rut;
        endforeach;

        $tutores = [];
        $organizaciones = OrganizacionExterna::orderBy('id','DESC');


        return view('admin.actividad.create',compact('alumnos','academicos','tutores'));
    }

    public function store(TrabajoTitulacionStoreRequest $request)
    {
        
        $id = $request->tipoActividad_id;
        $resp = TipoActividadTitulacion::find($id)->organizacionExterna;
        $alumnos = $request->alumno_id;
        $guias = $request->academico_id;

        Validator::make($request->all(), [
            'tutor_id' => Rule::requiredIf($resp=="SI"),
            'alumno_id.*' => [
                function ($attribute, $value, $fail) {
                    $trabajos = Alumno::find($value)->trabajos;
                    foreach($trabajos as $trabajo):
                        if($trabajo->estado != "FINALIZADA"){
                            $nombreEstudiante = Alumno::find($value)->nombre;
                            $fail($nombreEstudiante.' ya tiene un trabajo de titulación en curso');
                        }
                    endforeach;
                    //dd($trabajos);
                },
            ],
        ],[
            'tutor_id.required' => 'Este tipo de actividad de titulación requiere Organizacion Externa y Tutor',
        ])->validate();

        $nuevo_trabajo = TrabajoTitulacion::create($request->all());

        $nuevo_trabajo->alumnos()->attach($alumnos);
        $nuevo_trabajo->guias()->attach($guias);


        return redirect()->route('principal')
        ->with('info','Tipo registrado con éxito');
    }

    public function show($id)
    {
        $trabajo = TrabajoTitulacion::find($id)->first();

        return $trabajo;
    }

    public function edit($id)
    {
        $trabajo = TrabajoTitulacion::find($id);

        $alumnos= []; 
        $academicos= [];
        $tutores = [];
        foreach(Alumno::orderBy('rut','asc')->where('disponible','SI')->get() as $alumno):
            $alumnos[$alumno->id] = $alumno->nombre.','.$alumno->rut;
        endforeach;
        foreach(Academico::orderBy('rut','asc')->where('disponible','SI')->get() as $academico):
            $academicos[$academico->id] = $academico->nombre.','.$academico->rut;
        endforeach;
        if($trabajo->tutor){
            $org_id = $trabajo->tutor->organizacion->id;
            foreach(Tutor::where('org_id',$org_id)->get() as $tutor):
                $tutores[$tutor->id] = $tutor->nombre;
            endforeach;
        }
        $organizaciones = OrganizacionExterna::all();

        return view('admin.actividad.edit', compact('trabajo','alumnos','academicos','tutores','organizaciones'));
    }

    public function editInscripcionFormal($id){

        $trabajo = TrabajoTitulacion::find($id);
        return view('admin.actividad.editNumeroInscripcion', compact('trabajo'));        
    }

    public function editRegistrarExamen($id){

        $trabajo = TrabajoTitulacion::find($id);
        return view('admin.actividad.editRegistrarExamen', compact('trabajo'));        
    }

    public function update(TrabajoTitulacionUpdateRequest $request, $id)
    {
        $cant_alumnos = count($request->alumno_id);
        
        $id_tipo = $request->tipoActividad_id;
        $cant_max = TipoActividadTitulacion::find($id_tipo)->cantMax;
        $resp = TipoActividadTitulacion::find($id_tipo)->organizacionExterna;
        $alumnos_eliminados = TrabajoTitulacion::find($id)->alumnos;
        $guias_eliminados = TrabajoTitulacion::find($id)->guias;

        $alumnos = $request->alumno_id;
        $guias = $request->academico_id;

        $validar_id_tutor = Validator::make($request->all(), [
            'tutor_id' => Rule::requiredIf($resp=="SI"),
            'alumno_id.*' => [
                function ($attribute, $value, $fail) use ($id) {
                    $trabajos = Alumno::find($value)->trabajos;
                    foreach($trabajos as $trabajo):
                        if($trabajo->estado != "FINALIZADA" && $trabajo->id != $id){
                            $nombreEstudiante = Alumno::find($value)->nombre;
                            $fail($nombreEstudiante.' ya tiene un trabajo de titulación en curso');
                        }
                    endforeach;
                    //dd($trabajos);
                },
            ],

        ],[
            'tutor_id.required' => 'Este tipo de actividad de titulación requiere Organizacion Externa y Tutor',
        ])->validate();
        $alumno_validate = Validator::make($request->all(), [
            'alumno_id' => 'max:'.$cant_max,

        ],[
            'alumno_id.max' => 'Este tipo de actividad de titulación puede tener como máximo '.$cant_max.' alumno(s)',
        ])->validate();
        


        $trabajo = TrabajoTitulacion::find($id);

        $trabajo->alumnos()->detach($alumnos_eliminados);
        $trabajo->guias()->detach($guias_eliminados);

        $trabajo->alumnos()->attach($alumnos);
        $trabajo->guias()->attach($guias);

        
        if($request->tutor_id == null){
            $trabajo->tutor_id = null;
        }
        $trabajo->fill($request->all())->save();

        return redirect()->route('principal')
        ->with('info','Tipo registrado con éxito');
    }

    public function updateInscripcionFormal(InscripcionFormalRequest $request, $id)
    {
        $trabajo = TrabajoTitulacion::find($id);

        $trabajo->fill($request->all())->save();

        return redirect()->route('inscripcion-formal')
        ->with('info','Tipo actualizado con éxito');
    }

    public function updateRegistrarExamen(RegistrarExamenRequest $request, $id)
    {
        $trabajo = TrabajoTitulacion::find($id);
        $trabajo->estado = 'FINALIZADA';

        $trabajo->fill($request->all())->save();

        return redirect()->route('registrar-examen')
        ->with('info','Tipo actualizado con éxito');
    }



    
    public function destroy($id)
    {
        $trabajo = TrabajoTitulacion::find($id);
        $trabajo->estado = 'ANULADA';

        $trabajo->save();

        $trabajos = TrabajoTitulacion::orderBy('id', 'DESC')
        ->Where('estado','INGRESADA')
        ->orWhere('estado','ACEPTADA')
        ->paginate();

        return view('admin.actividad.indexAnularTrabajo', compact('trabajos'));
        
    }

    public function retornarTutores(Request $request)
    {
        if($request->id){
            $tutores = OrganizacionExterna::find($request->id)->tutores;
            //dd($tutores_org);

            return response()->json(
                $tutores
            ,200);

        }

    }

    public function retornarDatos(Request $request)
    {
        if($request->id){
            $cantidad_alumnos = TrabajoTitulacion::find($request->id)->alumnos->count();
            $cantidad_guias = TrabajoTitulacion::find($request->id)->guias->count();
            $tutor_id = TrabajoTitulacion::find($request->id)->tutor;
            $cantidad_max = TrabajoTitulacion::find($request->id)->tipoActividad->cantMax;
            $tieneOrgEx = TrabajoTitulacion::find($request->id)->tipoActividad->organizacionExterna;
            return response()->json([
                'cantidadAlumnos' => $cantidad_alumnos,
                'cantidadGuias' => $cantidad_guias,
                'cantidadMax' => $cantidad_max,
                'orgEx' => $tieneOrgEx,
                'tutorid' => $tutor_id,
            ],200);
        }   
    }
}
