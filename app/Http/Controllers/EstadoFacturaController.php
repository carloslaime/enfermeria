<?php

namespace App\Http\Controllers;

use App\Models\EstadoFactura;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class EstadoFacturaController extends Controller
{
    public $parControl=[
        'modulo'=>'reportes',
        'funcionalidad'=>'estadofacturas',
        'titulo' =>'Estados Facturas',
    ];

    public function index(Request $request)
    {
        $estadofactura = new EstadoFactura();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $estadofactura->obtenerEstadoFacturas($buscar,$pagina);
        $mergeData = [
            'estadofacturas'=>$resultado['estadofacturas'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('estadofacturas.index',$mergeData);
    }
    public function mostrar($id)
    {
        $estadofactura = EstadoFactura::find($id);
        $mergeData = ['id'=>$id,'estadofactura'=>$estadofactura,'parControl'=>$this->parControl];
        return view('estadofacturas.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('estadofacturas.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'estado'=>'required|max:30',
            'activo'=>'required',
        ]);

        $estadofactura = new EstadoFactura();
        $estadofactura->estado = $request->estado;
        $estadofactura->activo = $request->activo?true:false;
        $estadofactura->save();

        return redirect()->route('estadofacturas.mostrar',$estadofactura->id);
    }

    public function modificar($id)
    {
        $estadofactura = EstadoFactura::find($id);
        $mergeData = ['id'=>$id,'estadofactura'=>$estadofactura,'parControl'=>$this->parControl];
        return view('estadofacturas.modificar',$mergeData);
    }

    public function actualizar(Request $request, EstadoFactura $estadofactura)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'activo'=>'required',
        ]);
        $estadofactura->estado = $request->estado;
        $estadofactura->activo = $request->activo?true:false;
        $estadofactura->save();

        return redirect()->route('estadofacturas.mostrar',$estadofactura->id);
    }

    public function eliminar($id)
    {
        $estadofactura = EstadoFactura::find($id);
        $estadofactura->eliminado=true;
        $estadofactura->save();
        return redirect()->route('estadofacturas.index');
    }
}
