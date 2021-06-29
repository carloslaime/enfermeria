<?php

namespace App\Http\Controllers;

use App\Models\Enfermera;
use App\Models\EstadoEnfermera;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class EnfermeraController extends Controller
{
    public $parControl=[
        'modulo'=>'personal',
        'funcionalidad'=>'enfermeras',
        'titulo' =>'Gestionar Enfermeras',
    ];

    public function index(Request $request)
    {
        $enfermera = new Enfermera();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $enfermera->obtenerEnfermeras($buscar,$pagina);
        $mergeData = [
            'enfermeras'=>$resultado['enfermeras'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('enfermeras.index',$mergeData);
    }
    
    public function mostrar($id)
    {
        $enfermera = Enfermera::find($id);
        $mergeData = ['id'=>$id,'enfermera'=>$enfermera,'parControl'=>$this->parControl];
        return view('enfermeras.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $estadoenfermera= new EstadoEnfermera();
        $estadoenfermeras = $estadoenfermera->obtenerEstadoEnfermerasActivos();
        $mergeData = ['parControl'=>$this->parControl,'estadoenfermeras'=>$estadoenfermeras];
        return view('enfermeras.agregar',$mergeData);    
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombres'=>'required|max:250',
            'primer_apellido'=>'required|max:250',
            'segundo_apellido'=>'max:250',
            'genero'=>'required|max:1',
            'ci'=>'required|max:10',
            'ci_exp'=>'required|max:5',
            'fecha_nacimiento'=>'required|max:10',
            'celular'=>'required|max:8',
            'correo'=>'max:250',
            'especialidad'=>'required|max:250',
            'estado_id'=>'max:250',
            'activo'=>'required',
        ]);
        $enfermera = new Enfermera();
        $enfermera->nombres = $request->nombres;
        $enfermera->primer_apellido = $request->primer_apellido;
        $enfermera->segundo_apellido = $request->segundo_apellido;
        $enfermera->genero = $request->genero;
        $enfermera->ci = $request->ci;
        $enfermera->ci_exp = $request->ci_exp;
        $enfermera->fecha_nacimiento = $request->fecha_nacimiento;
        $enfermera->celular = $request->celular;
        $enfermera->correo = $request->correo;
        $enfermera->especialidad = $request->especialidad;
        $enfermera->perfil_id = Enfermera::getIdPerfilEnfermera();
        $enfermera->estado_id = $request->estado_id; //Enfermera::getEstado();
        $enfermera->activo = $request->activo?true:false;
        $enfermera->save();

        return redirect()->route('enfermeras.mostrar',$enfermera->id);
    }

    public function modificar($id)
    {
        $enfermera = Enfermera::find($id);
        $estadoenfermera = new EstadoEnfermera();
        $estadoenfermeras = $estadoenfermera->obtenerEstadoEnfermerasActivos();
        $mergeData = ['id'=>$id,'enfermera'=>$enfermera,'estadoenfermeras'=>$estadoenfermeras,'parControl'=>$this->parControl];
        return view('enfermeras.modificar',$mergeData);
    }

    public function actualizar(Request $request, Enfermera $enfermera)
    {
        $request->validate([
            'nombres'=>'required|max:250',
            'primer_apellido'=>'required|max:250',
            'segundo_apellido'=>'max:250',
            'genero'=>'required|max:1',
            'ci'=>'required|max:10',
            'ci_exp'=>'required|max:5',
            'fecha_nacimiento'=>'required|max:10',
            'celular'=>'required|max:8',
            'correo'=>'max:250',
            'especialidad'=>'required|max:250',
            'estado_id'=>'max:250',
            'activo'=>'required',
        ]);
        $enfermera->nombres = $request->nombres;
        $enfermera->primer_apellido = $request->primer_apellido;
        $enfermera->segundo_apellido = $request->segundo_apellido;
        $enfermera->genero = $request->genero;
        $enfermera->ci = $request->ci;
        $enfermera->ci_exp = $request->ci_exp;
        $enfermera->fecha_nacimiento = $request->fecha_nacimiento;
        $enfermera->celular = $request->celular;
        $enfermera->correo = $request->correo;
        $enfermera->especialidad = $request->especialidad;
        $enfermera->estado_id = $request->estado_id; //Enfermera::getEstado();
        $enfermera->activo = $request->activo?true:false;
        $enfermera->save();
        return redirect()->route('enfermeras.mostrar',$enfermera->id);
    }

    public function eliminar($id)
    {
        $enfermera = Enfermera::find($id);
        $enfermera->eliminado=true;
        $enfermera->save();
        return redirect()->route('enfermeras.index');
    }

    /*public function personasActivas(Request $request)
    {
        $buscar=$request->q;
        $enfermera = new Enfermera();
        $personas = $enfermera->buscarPersonas($buscar);
        $resultado=[];
        foreach ($personas as $persona){
            $resultado[]=(object)['name'=>$persona->nombre,'id'=>$persona->id];
        }
        return json_encode($resultado);
    }*/

    
}
