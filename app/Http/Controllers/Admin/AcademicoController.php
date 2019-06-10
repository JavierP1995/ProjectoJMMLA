<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\AcademicoStoreRequest;
use App\Http\Requests\AcademicoUpdateRequest;

use App\Academico;

class AcademicoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $academicos = Academico::orderBy('id', 'DESC')
                ->where('rut', 'LIKE', "$rutConsulta%")
                ->where('disponible','SI')->paginate();
            return view('admin.academicos.index', compact('academicos'));
        }
        $academicos = Academico::orderBy('id', 'DESC')
        ->where('disponible','SI')->paginate();
        return view('admin.academicos.index', compact('academicos'));
    }

    public function index2(Request $request)
    {
        if($request->rutConsulta){
            $rutConsulta = $request->get('rutConsulta');
            $academicos = Academico::orderBy('id', 'DESC')
                ->where('rut', 'LIKE', "$rutConsulta%")
                ->where('disponible','NO')->paginate();
            return view('admin.academicos.recuperar', compact('academicos'));
        }
        $academicos = Academico::orderBy('id', 'DESC')
        ->where('disponible','NO')->paginate();

        return view('admin.academicos.recuperar', compact('academicos'));

    }

    public function create()
    {
        return view('admin.academicos.create');
    }

    public function store(AcademicoStoreRequest $request)
    {
        $academico = Academico::create($request->all());
        session()->flash('aa', 'El académico fue ingresado con éxito'); 
        return view('admin.academicos.create');  
    }

    public function show($id)
    {
        $academico = Academico::find($id);
        $academico->disponible = 'SI';

        $academico->save();

        $academicos = Academico::orderBy('id', 'DESC')
            ->where('disponible','NO')->paginate();

        session()->flash('ra', 'El académico fue recuperado con éxito'); 
        return view('admin.academicos.recuperar', compact('academicos'));  
    }

    public function edit($id)
    {
        $academico = Academico::find($id);
        return view('admin.academicos.edit', compact('academico'));
    }


    public function update(AcademicoUpdateRequest $request, $id)
    {
        $academico = Academico::find($id);
        $academico->fill($request->all())->save();
        $academicos = Academico::orderBy('id', 'DESC')
        ->where('disponible','SI')->paginate();
        session()->flash('ea', 'El académico fue editado con éxito'); 
        return view('admin.academicos.index', compact('academicos'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academico = Academico::find($id);
        $academico->disponible = 'NO';

        $academico->save();

        $academicos = Academico::orderBy('id', 'DESC')
            ->where('disponible','SI')->paginate();

        session()->flash('da', 'El academico fue eliminado con éxito');   
        return view('admin.academicos.index', compact('academicos'));
        
    }
}
