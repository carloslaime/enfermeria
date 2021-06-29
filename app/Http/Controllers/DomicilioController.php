<?php

namespace App\Http\Controllers;

use App\Models\Domicilio;
use App\Models\Paciente;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class DomicilioController extends Controller
{
    public $parControl=[
        'modulo'=>'pacientes',
        'funcionalidad'=>'domicilios',
        'titulo' =>'Domicilios',
    ];

    public function index(Request $request)
    {
        $domicilio = new Domicilio();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $domicilio->obtenerDomicilios($buscar,$pagina);
        $mergeData = [
            'domicilios'=>$resultado['domicilios'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('domicilios.index',$mergeData);
    }

    public function agregar()
    { 
        $paciente= new Paciente();
        $pacientes = $paciente->obtenerPacientesActivos();
        $mergeData = ['parControl'=>$this->parControl,'pacientes'=>$pacientes];
        return view('domicilios.agregar',$mergeData);  
    }

    public function mostrar($id)
    {
        $domicilio = Domicilio::getDomicilio($id);
        $mergeData = ['id'=>$id,'domicilio'=>$domicilio,'parControl'=>$this->parControl];
        return view('domicilios.mostrar',$mergeData);
    }

   

    public function insertar(Request $request)
    {
        $request->validate([
            'avenida'=>'required|max:250',
            'calle'=>'required|max:250',
            'numero'=>'required|max:250',
            'uv'=>'required|max:25',
            'distrito'=>'required|max:5',
            'referencia'=>'required|max:250',
            'paciente_id'=>'required',
            'activo'=>'required',
        ]);

        $domicilio = new Domicilio();
        $domicilio->avenida = $request->avenida;
        $domicilio->calle = $request->calle;
        $domicilio->numero = $request->numero;
        $domicilio->uv = $request->uv;
        $domicilio->distrito = $request->distrito;
        $domicilio->referencia = $request->referencia;
        $domicilio->latitud = $request->latitud;
        $domicilio->longitud = $request->longitud;
        $domicilio->paciente_id = $request->paciente_id;
        $domicilio->activo = $request->activo?true:false;
        $domicilio->save();

        return redirect()->route('domicilios.mostrar',$domicilio->id);
    }

    public function modificar($id)
    {
        $paciente = new Paciente();
        $pacientes = $paciente->obtenerPacientesActivos();
        $domicilio = Domicilio::find($id);
        $mergeData = ['id'=>$id,'domicilio'=>$domicilio,'pacientes'=>$pacientes,'parControl'=>$this->parControl];
        return view('domicilios.modificar',$mergeData);
    }

    public function actualizar(Request $request, Domicilio $domicilio)
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
        $domicilio->latitud = $request->latitud;
        $domicilio->longitud = $request->longitud;
        $domicilio->activo = $request->activo?true:false;
        $domicilio->save();

        return redirect()->route('domicilios.mostrar',$domicilio->id);
    }

    public function eliminar($id)
    {
        $domicilio = Domicilio::find($id);
        $domicilio->eliminado=true;
        $domicilio->save();
        return redirect()->route('domicilios.index');
    }

}
