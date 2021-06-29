<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{
    public $parControl=[
        'modulo'=>'trabajo',
        'funcionalidad'=>'modalidades',
        'titulo' =>'Modalidades',
    ];

    public function index(Request $request)
    {
        $modalidad = new Modalidad();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $modalidad->obtenerModalidades($buscar,$pagina);
        $mergeData = [
            'modalidades'=>$resultado['modalidades'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('modalidades.index',$mergeData);
    }
    public function mostrar($id)
    {
        $modalidad = Modalidad::find($id);
        $mergeData = ['id'=>$id,'modalidad'=>$modalidad,'parControl'=>$this->parControl];
        return view('modalidades.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('modalidades.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'tipo'=>'required|max:30',
            'activo'=>'required',
        ]);

        $modalidad = new Modalidad();
        $modalidad->tipo = $request->tipo;
        $modalidad->activo = $request->activo?true:false;
        $modalidad->save();

        return redirect()->route('modalidades.mostrar',$modalidad->id);
    }

    public function modificar($id)
    {
        $modalidad = Modalidad::find($id);
        $mergeData = ['id'=>$id,'modalidad'=>$modalidad,'parControl'=>$this->parControl];
        return view('modalidades.modificar',$mergeData);
    }

    public function actualizar(Request $request, Modalidad $modalidad)
    {
        $request->validate([
            'tipo'=>'required|max:30',
            'activo'=>'required',
        ]);
        $modalidad->tipo = $request->tipo;
        $modalidad->activo = $request->activo?true:false;
        $modalidad->save();

        return redirect()->route('modalidades.mostrar',$modalidad->id);
    }

    public function eliminar($id)
    {
        $modalidad = Modalidad::find($id);
        $modalidad->eliminado=true;
        $modalidad->save();
        return redirect()->route('modalidades.index');
    }
}
