<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Modalidad;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public $parControl=[
        'modulo'=>'trabajo',
        'funcionalidad'=>'servicios',
        'titulo' =>'Servicios',
    ];

    public function index(Request $request)
    {
        $servicio = new Servicio();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $servicio->obtenerServicios($buscar,$pagina);
        $mergeData = [
            'servicios'=>$resultado['servicios'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('servicios.index',$mergeData);
    }
    public function mostrar($id)
    {
        $servicio = Servicio::getServicio($id);
        $mergeData = ['id'=>$id,'servicio'=>$servicio,'parControl'=>$this->parControl];
        return view('servicios.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $modalidad = new Modalidad();
        $modalidades = $modalidad->obtenerModalidadesActivos();
        $mergeData = ['parControl'=>$this->parControl,'modalidades'=>$modalidades];
        return view('servicios.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:50',
            'descripcion'=>'required|max:250',
            'costo'=>'required|max:30',
            'modalidad_id'=>'required',
            'activo'=>'required',
        ]);

        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->costo = $request->costo;
        $servicio->modalidad_id = $request->modalidad_id;
        $servicio->activo = $request->activo?true:false;
        $servicio->save();

        return redirect()->route('servicios.mostrar',$servicio->id);
    }

    public function modificar($id)
    {
        $modalidad = new Modalidad();
        $modalidades = $modalidad->obtenerModalidadesActivos();
        $servicio = Servicio::find($id);
        $mergeData = ['id'=>$id,'servicio'=>$servicio,'modalidades'=>$modalidades,'parControl'=>$this->parControl];
        return view('servicios.modificar',$mergeData);
    }

    public function actualizar(Request $request, Servicio $servicio)
    {
        $request->validate([
            'nombre'=>'required|max:50',
            'descripcion'=>'required|max:250',
            'costo'=>'required|max:30',
            'modalidad_id'=>'required',
            'activo'=>'required',
        ]);
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->costo = $request->costo;
        $servicio->modalidad_id = $request->modalidad_id;
        $servicio->activo = $request->activo?true:false;
        $servicio->save();

        return redirect()->route('servicios.mostrar',$servicio->id);
    }

    public function eliminar($id)
    {
        $servicio = Servicio::find($id);
        $servicio->eliminado=true;
        $servicio->save();
        return redirect()->route('servicios.index');
    }
}
