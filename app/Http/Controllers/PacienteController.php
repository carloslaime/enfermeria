<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public $parControl=[
        'modulo'=>'pacientes',
        'funcionalidad'=>'pacientes',
        'titulo' =>'Gestionar Pacientes',
    ];

    public function index(Request $request)
    {
        $paciente = new Paciente();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $paciente->obtenerPacientes($buscar,$pagina);
        $mergeData = [
            'pacientes'=>$resultado['pacientes'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('pacientes.index',$mergeData);
    }
    
    public function mostrar($id)
    {
        $paciente = Paciente::find($id);
        $mergeData = ['id'=>$id,'paciente'=>$paciente,'parControl'=>$this->parControl];
        return view('pacientes.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('pacientes.agregar',$mergeData);    
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
            'ocupacion'=>'required|max:250',
            'activo'=>'required',
        ]);
        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->primer_apellido = $request->primer_apellido;
        $paciente->segundo_apellido = $request->segundo_apellido;
        $paciente->genero = $request->genero;
        $paciente->ci = $request->ci;
        $paciente->ci_exp = $request->ci_exp;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->ocupacion = $request->ocupacion;
        $paciente->login = $paciente->correo;
        $paciente->pass = $paciente->ci;
        $paciente->perfil_id = Paciente::getIdPerfilPaciente();
        $paciente->activo = $request->activo?true:false;
        $paciente->save();

        return redirect()->route('pacientes.mostrar',$paciente->id);
    }

    public function modificar($id)
    {
        $paciente = Paciente::find($id);
        $mergeData = ['id'=>$id,'paciente'=>$paciente,'parControl'=>$this->parControl];
        return view('pacientes.modificar',$mergeData);
    }

    public function actualizar(Request $request, Paciente $paciente)
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
            'ocupacion'=>'required|max:250',
            'login'=>'required|max:250',
            'pass'=>'required|max:250',
            'activo'=>'required',
        ]);
        $paciente->nombres = $request->nombres;
        $paciente->primer_apellido = $request->primer_apellido;
        $paciente->segundo_apellido = $request->segundo_apellido;
        $paciente->genero = $request->genero;
        $paciente->ci = $request->ci;
        $paciente->ci_exp = $request->ci_exp;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->ocupacion = $request->ocupacion;
        $paciente->login = $paciente->correo;
        $paciente->pass = $paciente->ci;
        $paciente->perfil_id = Paciente::getIdPerfilPaciente();
        $paciente->activo = $request->activo?true:false;
        $paciente->save();
        return redirect()->route('pacientes.mostrar',$paciente->id);
    }

    public function eliminar($id)
    {
        $paciente = Enfermera::find($id);
        $paciente->eliminado=true;
        $paciente->save();
        return redirect()->route('pacientes.index');
    }

    /*public function personasActivas(Request $request)
    {
        $buscar=$request->q;
        $paciente = new Paciente();
        $personas = $paciente->buscarPersonas($buscar);
        $resultado=[];
        foreach ($personas as $persona){
            $resultado[]=(object)['name'=>$persona->nombre,'id'=>$persona->id];
        }
        return json_encode($resultado);
    }*/

    
}
