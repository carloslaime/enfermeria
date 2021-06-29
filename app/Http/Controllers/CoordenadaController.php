<?php

namespace App\Http\Controllers;

use App\Models\Coordenada;
use App\Models\Domicilio;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class CoordenadaController extends Controller
{
    public $parControl=[
        'modulo'=>'pacientes',
        'funcionalidad'=>'coordenadas',
        'titulo' =>'Coordenadas',
    ];

    public function index(Request $request)
    {
        $coordenada = new Coordenada();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $coordenada->obtenerCoordenadas($buscar,$pagina);
        $mergeData = [
            'coordenadas'=>$resultado['coordenadas'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('coordenadas.index',$mergeData);
    }
    public function mostrar($id)
    {
        $coordenada = Coordenada::find($id);
        $mergeData = ['id'=>$id,'coordenada'=>$coordenada,'parControl'=>$this->parControl];
        return view('coordenadas.mostrar',$mergeData);
    }

    public function agregar()
    { 
        
        $mergeData = ['parControl'=>$this->parControl];
        return view('coordenadas.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'latitud'=>'required',
            'longitud'=>'required',
            'domicilio_id'=>'required',
            'activo'=>'required',
        ]);

        $coordenada = new Coordenada();
        $coordenada->latitud = $request->latitud;
        $coordenada->longitud = $request->longitud;
        $coordenada->domicilio_id = getDomiclio($id);
        $coordenada->activo = $request->activo?true:false;
        $coordenada->save();

        return redirect()->route('coordenadas.mostrar',$coordenada->id);
    }

    public function modificar($id)
    {
        $coordenada = Coordenada::find($id);
        $mergeData = ['id'=>$id,'coordenada'=>$coordenada,'parControl'=>$this->parControl];
        return view('coordenadas.modificar',$mergeData);
    }

    public function actualizar(Request $request, Coordenada $domicilio)
    {
        $request->validate([
            'avenida'=>'required',
            'calle'=>'required',
            'numero'=>'required',
            'uv'=>'required',
            'distrito'=>'required',
            'referencia'=>'required',
            'activo'=>'required',
        ]);

        $domicilio->avenida = $request->avenida;
        $domicilio->calle = $request->calle;
        $domicilio->numero = $request->numero;
        $domicilio->uv = $request->uv;
        $domicilio->distrito = $request->distrito;
        $domicilio->referencia = $request->referencia;
        $domicilio->activo = $request->activo?true:false;
        $domicilio->save();

        return redirect()->route('coordenadas.mostrar',$domicilio->id);
    }

    public function eliminar($id)
    {
        $domicilio = Coordenada::find($id);
        $domicilio->eliminado=true;
        $domicilio->save();
        return redirect()->route('coordenadas.index');
    }
}
