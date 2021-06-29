<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class FormaPagoController extends Controller
{
    public $parControl=[
        'modulo'=>'gestionaratencion',
        'funcionalidad'=>'formas_pagos',
        'titulo' =>'Formas de Pago',
    ];

    public function index(Request $request)
    {
        $formapago = new FormaPago();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $formapago->obtenerFormasPagos($buscar,$pagina);
        $mergeData = [
            'formas_pagos'=>$resultado['formas_pagos'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('formas_pagos.index',$mergeData);
    }
    public function mostrar($id)
    {
        $formapago = FormaPago::find($id);
        $mergeData = ['id'=>$id,'forma_pago'=>$formapago,'parControl'=>$this->parControl];
        return view('formas_pagos.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('formas_pagos.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'tipo'=>'required|max:100',
            'activo'=>'required',
        ]);

        $formapago = new FormaPago();
        $formapago->tipo = $request->tipo;
        $formapago->activo = $request->activo?true:false;
        $formapago->save();

        return redirect()->route('formas_pagos.mostrar',$formapago->id);
    }

    public function modificar($id)
    {
        $formapago = FormaPago::find($id);
        $mergeData = ['id'=>$id,'forma_pago'=>$formapago,'parControl'=>$this->parControl];
        return view('formas_pagos.modificar',$mergeData);
    }

    public function actualizar(Request $request, FormaPago $formapago)
    {
        $request->validate([
            'tipo'=>'required|max:100',
            'activo'=>'required',
        ]);
        $formapago->tipo = $request->tipo;
        $formapago->activo = $request->activo?true:false;
        $formapago->save();

        return redirect()->route('formas_pagos.mostrar',$formapago->id);
    }

    public function eliminar($id)
    {
        $formapago = FormaPago::find($id);
        $formapago->eliminado=true;
        $formapago->save();
        return redirect()->route('formas_pagos.index');
    }
}
