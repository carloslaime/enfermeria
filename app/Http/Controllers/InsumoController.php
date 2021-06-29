<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    public $parControl=[
        'modulo'=>'trabajo',
        'funcionalidad'=>'insumos',
        'titulo' =>'Insumos',
    ];

    public function index(Request $request)
    {
        $insumo = new Insumo();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $insumo->obtenerInsumos($buscar,$pagina);
        $mergeData = [
            'insumos'=>$resultado['insumos'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('insumos.index',$mergeData);
    }
    public function mostrar($id)
    {
        $insumo = Insumo::find($id);
        $mergeData = ['id'=>$id,'insumo'=>$insumo,'parControl'=>$this->parControl];
        return view('insumos.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('insumos.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'descripcion'=>'required|max:250',
            'cantidad'=>'required|max:30',
            'costo_uso'=>'required|max:30',
            'activo'=>'required',
        ]);

        $insumo = new Insumo();
        $insumo->nombre = $request->nombre;
        $insumo->descripcion = $request->descripcion;
        $insumo->cantidad = $request->cantidad;
        $insumo->costo_uso = $request->costo_uso;
        $insumo->activo = $request->activo?true:false;
        $insumo->save();

        return redirect()->route('insumos.mostrar',$insumo->id);
    }

    public function modificar($id)
    {
        $insumo = Insumo::find($id);
        $mergeData = ['id'=>$id,'insumo'=>$insumo,'parControl'=>$this->parControl];
        return view('insumos.modificar',$mergeData);
    }

    public function actualizar(Request $request, Insumo $insumo)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'descripcion'=>'required|max:250',
            'cantidad'=>'required|max:30',
            'costo_uso'=>'required|max:30',
            'activo'=>'required',
        ]);
        $insumo->nombre = $request->nombre;
        $insumo->descripcion = $request->descripcion;
        $insumo->cantidad = $request->cantidad;
        $insumo->costo_uso = $request->costo_uso;
        $insumo->activo = $request->activo?true:false;
        $insumo->save();

        return redirect()->route('insumos.mostrar',$insumo->id);
    }

    public function eliminar($id)
    {
        $insumo = Insumo::find($id);
        $insumo->eliminado=true;
        $insumo->save();
        return redirect()->route('insumos.index');
    }
}
