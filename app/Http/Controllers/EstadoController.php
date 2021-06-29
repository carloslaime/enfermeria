<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public $parControl=[
        'modulo'=>'gestionaratencion',
        'funcionalidad'=>'estados',
        'titulo' =>'Estados Atencion',
    ];

    public function index(Request $request)
    {
        $estado = new Estado();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $estado->obtenerEstados($buscar,$pagina);
        $mergeData = [
            'estados'=>$resultado['estados'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('estados.index',$mergeData);
    }
    public function mostrar($id)
    {
        $estado = Estado::find($id);
        $mergeData = ['id'=>$id,'estado'=>$estado,'parControl'=>$this->parControl];
        return view('estados.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('estados.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'estado'=>'required|max:30',
            'activo'=>'required',
        ]);

        $estado = new Estado();
        $estado->estado = $request->estado;
        $estado->activo = $request->activo?true:false;
        $estado->save();

        return redirect()->route('estados.mostrar',$estado->id);
    }

    public function modificar($id)
    {
        $estado = Estado::find($id);
        $mergeData = ['id'=>$id,'estado'=>$estado,'parControl'=>$this->parControl];
        return view('estados.modificar',$mergeData);
    }

    public function actualizar(Request $request, Estado $estado)
    {
        $request->validate([
            'estado'=>'required|max:30',
            'activo'=>'required',
        ]);
        $estado->estado = $request->estado;
        $estado->activo = $request->activo?true:false;
        $estado->save();

        return redirect()->route('estados.mostrar',$estado->id);
    }

    public function eliminar($id)
    {
        $estado = Estado::find($id);
        $estado->eliminado=true;
        $estado->save();
        return redirect()->route('estados.index');
    }
}
