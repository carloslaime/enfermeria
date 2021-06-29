<?php

namespace App\Http\Controllers;

use App\Models\EstadoEnfermera;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class EstadoEnfermeraController extends Controller
{
    public $parControl=[
        'modulo'=>'personal',
        'funcionalidad'=>'estadosenfermeras',
        'titulo' =>'Estados Enfermeras',
    ];

    public function index(Request $request)
    {
        $estadoenfermera = new EstadoEnfermera();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $estadoenfermera->obtenerEstadoEnfermeras($buscar,$pagina);
        $mergeData = [
            'estadoenfermeras'=>$resultado['estadoenfermeras'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('estadoenfermeras.index',$mergeData);
    }
    public function mostrar($id)
    {
        $estadoenfermera = EstadoEnfermera::find($id);
        $mergeData = ['id'=>$id,'estadoenfermera'=>$estadoenfermera,'parControl'=>$this->parControl];
        return view('estadoenfermeras.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('estadoenfermeras.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'estado'=>'required|max:30',
            'activo'=>'required',
        ]);

        $estadoenfermera = new EstadoEnfermera();
        $estadoenfermera->estado = $request->estado;
        $estadoenfermera->activo = $request->activo?true:false;
        $estadoenfermera->save();

        return redirect()->route('estadoenfermeras.mostrar',$estadoenfermera->id);
    }

    public function modificar($id)
    {
        $estadoenfermera = EstadoEnfermera::find($id);
        $mergeData = ['id'=>$id,'estadoenfermera'=>$estadoenfermera,'parControl'=>$this->parControl];
        return view('estadoenfermeras.modificar',$mergeData);
    }

    public function actualizar(Request $request, EstadoEnfermera $estadoenfermera)
    {
        $request->validate([
            'estado'=>'required|max:30',
            'activo'=>'required',
        ]);
        $estadoenfermera->estado = $request->estado;
        $estadoenfermera->activo = $request->activo?true:false;
        $estadoenfermera->save();

        return redirect()->route('estadoenfermeras.mostrar',$estadoenfermera->id);
    }

    public function eliminar($id)
    {
        $estadoenfermera = EstadoEnfermera::find($id);
        $estadoenfermera->eliminado=true;
        $estadoenfermera->save();
        return redirect()->route('estadoenfermeras.index');
    }
}
