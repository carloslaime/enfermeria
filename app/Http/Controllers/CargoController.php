<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public $parControl=[
        'modulo'=>'personal',
        'funcionalidad'=>'cargos',
        'titulo' =>'Cargos',
    ];

    public function index(Request $request)
    {
        $cargo = new Cargo();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $cargo->obtenerCargos($buscar,$pagina);
        $mergeData = [
            'cargos'=>$resultado['cargos'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('cargos.index',$mergeData);
    }
    public function mostrar($id)
    {
        $cargo = Cargo::find($id);
        $mergeData = ['id'=>$id,'cargo'=>$cargo,'parControl'=>$this->parControl];
        return view('cargos.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('cargos.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'activo'=>'required',
        ]);

        $cargo = new Cargo();
        $cargo->nombre = $request->nombre;
        $cargo->activo = $request->activo?true:false;
        $cargo->save();

        return redirect()->route('cargos.mostrar',$cargo->id);
    }

    public function modificar($id)
    {
        $cargo = Cargo::find($id);
        $mergeData = ['id'=>$id,'cargo'=>$cargo,'parControl'=>$this->parControl];
        return view('cargos.modificar',$mergeData);
    }

    public function actualizar(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'activo'=>'required',
        ]);
        $cargo->nombre = $request->nombre;
        $cargo->activo = $request->activo?true:false;
        $cargo->save();

        return redirect()->route('cargos.mostrar',$cargo->id);
    }

    public function eliminar($id)
    {
        $cargo = Cargo::find($id);
        $cargo->eliminado=true;
        $cargo->save();
        return redirect()->route('cargos.index');
    }
}
