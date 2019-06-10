<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AlumnoStoreRequest;
use App\Http\Requests\AlumnoUpdateRequest;
use Illuminate\Validation\Rule;
use Validator;

use App\Http\Controllers\Controller;

use App\Alumno;
use App\Carrera;

class AlumnoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $alumnos = Alumno::orderBy('id', 'DESC')
                ->where('rut', 'LIKE', "$rutConsulta%")
                ->where('disponible','SI')->paginate();
            return view('admin.alumnos.index', compact('alumnos'));
        }

        $alumnos = Alumno::orderBy('id', 'DESC')
        ->where('disponible','SI')->paginate();
        return view('admin.alumnos.index', compact('alumnos'));
    }

    public function index2(Request $request)
    {
        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $alumnos = Alumno::orderBy('id', 'DESC')
                ->where('rut', 'LIKE', "$rutConsulta%")
                ->where('disponible','NO')->paginate();
                return view('admin.alumnos.recuperar', compact('alumnos'));
        }

        $alumnos = Alumno::orderBy('id', 'DESC')
        ->where('disponible','NO')->paginate();
        return view('admin.alumnos.recuperar', compact('alumnos'));
    }

    public function create()
    {
        return view('admin.alumnos.create');
    }

    public function store(AlumnoStoreRequest $request)
    {
        
        Validator::make($request->all(), [
            'rut' => [
                function ($attribute, $value, $fail) {
                    foreach(Alumno::all() as $alumno1):
                        if($alumno1->rut == $value && $alumno1->titulado == "NO"){
                            $nombre = $alumno1->nombre;
                            $fail('Nombre: '.$nombre.', rut: '.$value.' es un estudiante existente no titulado');
                        }
                    endforeach;                 
                },
            ],
        ])->validate();
        $alumno = Alumno::create($request->all());
        session()->flash('ae', 'El alumno fue ingresado con éxito'); 
        return view('admin.alumnos.create');  
    }

    public function show($id)
    {
        $alumno = Alumno::find($id);
        $alumno->disponible = 'SI';

        $alumno->save();

        $alumnos = Alumno::orderBy('id', 'DESC')
            ->where('disponible','NO')->paginate();
            session()->flash('re', 'El alumno fue recuperado con éxito'); 
            return view('admin.alumnos.recuperar', compact('alumnos'));  
    }

    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('admin.alumnos.edit', compact('alumno'));
    }


    public function update(AlumnoUpdateRequest $request, $id)
    {
        $alumno = Alumno::find($id);
        
        $carrera_id = $request->carrera_id;
        $rut = $alumno->rut;

        Validator::make($request->all(), [
            'carrera_id' => [
                'required',
                Rule::unique('alumnos')->where(function ($query) use($rut,$carrera_id,$id) {
                    return $query->where('rut', $rut)
                    ->where('carrera_id', $carrera_id)
                    ->whereNotIn('id',[$id]);
                }),
            ],
        ],[
        'carrera_id.unique' => 'No puedes cambiar la carrera a una que ya tiene registrada',
        ])->validate();

        $alumno->fill($request->all())->save();

        $alumnos = Alumno::orderBy('id', 'DESC')
        ->where('disponible','SI')->paginate();
       
        session()->flash('ee', 'El alumno fue editado con éxito'); 
        return view('admin.alumnos.index', compact('alumnos')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->disponible = 'NO';

        $alumno->save();

        $alumnos = Alumno::orderBy('id', 'DESC')
            ->where('disponible','SI')->paginate();

        session()->flash('de', 'El alumno fue eliminado con éxito');   
        return view('admin.alumnos.index', compact('alumnos'));
    }

}
