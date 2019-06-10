<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\TipoActividadTitulacionStoreRequest;
use App\Http\Requests\TipoActividadTitulacionUpdateRequest;

use App\TipoActividadTitulacion;

class TipoActividadTitulacionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $tipos = TipoActividadTitulacion::orderBy('id', 'DESC')
        ->where('disponible','SI')->paginate();

        return view('admin.tipoactividad.index', compact('tipos'));

    }

    public function index2()
    {
        $tipos = TipoActividadTitulacion::orderBy('id', 'DESC')
        ->where('disponible','NO')->paginate();

        return view('admin.tipoactividad.recuperar', compact('tipos'));

    }

    public function create()
    {

        return view('admin.tipoactividad.create');
    }

    public function store(TipoActividadTitulacionStoreRequest $request)
    {
        $tipo = TipoActividadTitulacion::create($request->all());

        session()->flash('at', 'El tipo de actividad fue ingresado con éxito'); 
        return view('admin.tipoactividad.create');  
    }

    public function show($id)
    {
        $tipo = TipoActividadTitulacion::find($id);
        $tipo->disponible = 'SI';

        $tipo->save();

        $tipos = TipoActividadTitulacion::orderBy('id', 'DESC')
            ->where('disponible','NO')->paginate();

        session()->flash('rt', 'El tipo de actividad fue recuperado con éxito'); 
        return view('admin.tipoactividad.recuperar', compact('tipos'));  
    }

    public function edit($id)
    {
        $tipo = TipoActividadTitulacion::find($id);

        return view('admin.tipoactividad.edit', compact('tipo'));
    }


    public function update(TipoActividadTitulacionUpdateRequest $request, $id)
    {
        $tipo = TipoActividadTitulacion::find($id);

        $tipo->fill($request->all())->save();
        $tipos = TipoActividadTitulacion::orderBy('id', 'DESC')
        ->where('disponible','SI')->paginate();
        session()->flash('et', 'El tipo de actividad fue editado con éxito'); 
        return view('admin.tipoactividad.index', compact('tipos'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = TipoActividadTitulacion::find($id);
        $tipo->disponible = 'NO';

        $tipo->save();

        $tipos = TipoActividadTitulacion::orderBy('id', 'DESC')
            ->where('disponible','SI')->paginate();

        session()->flash('dt', 'El tipo de actividad fue eliminado con éxito');   
        return view('admin.tipoactividad.index', compact('tipos'));
        
    }

    public function tieneOrgEx(Request $request){
        
        if($request->id){
            $respuesta = TipoActividadTitulacion::find($request->id)->organizacionExterna;
            $cantidad = TipoActividadTitulacion::find($request->id)->cantMax;
            return response()->json([
                'respuesta' => $respuesta,
                'cantidad' => $cantidad,
            ],200);

        }


    }
}
