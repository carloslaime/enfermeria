<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Servicio;
use App\Models\Insumo;
use App\Models\Paciente;
use App\Models\Domicilio;
use App\Models\FormaPago;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public $parControl=[
        'modulo'=>'gestionaratencion',
        'funcionalidad'=>'reservas',
        'titulo' =>'Gestionar Reservas',
    ];

    public function index(Request $request)
    {
        $reserva = new Reserva();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $reserva->obtenerReservas($buscar,$pagina);
        $mergeData = [
            'reservas'=>$resultado['reservas'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl
        ];
        return view('reservas.index',$mergeData);
    }
    public function mostrar($id)
    {
        $reserva = Reserva::getReserva($id);
        $mergeData = ['id'=>$id,'reserva'=>$reserva,'parControl'=>$this->parControl];
        return view('reservas.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $servicio = new Servicio();
        $servicios = $servicio->obtenerServiciosActivos();

        $insumo = new Insumo();
        $insumos = $insumo->obtenerInsumosActivos();

        $paciente = new Paciente();
        $pacientes = $paciente->obtenerPacientesActivos();

        $domicilio = new Domicilio();
        $domicilios = $domicilio->obtenerDomiciliosActivos();

        $formapago = new FormaPago();
        $formapagos = $formapago->obtenerFormasPagosActivos();

        $reserva = new Reserva();
        $reservas = $reserva->obtenerReservasActivos();

        $mergeData = ['parControl'=>$this->parControl,'reservas'=>$reservas,'servicios'=>$servicios,'insumos'=>$insumos,'pacientes'=>$pacientes,'domicilios'=>$domicilios,'formapagos'=>$formapagos];
        return view('reservas.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'hora'=>'required',
            'fecha'=>'required',
            'descripcion'=>'required',
           
            
            'servicio_id'=>'required',
            'insumo_id'=>'required',
            'paciente_id'=>'required',
            'domicilio_id'=>'required',
            'pago_id'=>'required',
            'activo'=>'required',
        ]);

        $reserva = new Reserva();
        $paciente = new Paciente();
        $reserva->hora = $request->hora;
        $reserva->fecha = $request->fecha;
        $reserva->descripcion = $request->descripcion;
        $reserva->monto_insumos = $request->monto_insumos;
        $reserva->monto_servicios =$request->monto_servicios;
        $reserva->total =$request->total;
        $reserva->servicio_id = $request->servicio_id;
        $reserva->insumo_id = $request->insumo_id;
        $reserva->paciente_id = $request->paciente_id;
        $reserva->domicilio_id = $request->domicilio_id;
        $reserva->pago_id = $request->pago_id;
        $reserva->activo = $request->activo?true:false;
        $reserva->save();

        return redirect()->route('reservas.mostrar',$reserva->id);
    }

    public function modificar($id)
    {
        $servicio = new Servicio();
        $servicios = $servicio->obtenerServiciosActivos();

        $insumo = new Insumo();
        $insumos = $insumo->obtenerInsumosActivos();

        $paciente = new Paciente();
        $pacientes = $paciente->obtenerPacientesActivos();

        $domicilio = new Domicilio();
        $domicilios = $domicilio->obtenerDomiciliosActivos();

        $formapago = new FormaPago();
        $formapagos = $formapago->obtenerFormasPagosActivos();

        $reserva = Reserva::find($id);
        $mergeData = ['parControl'=>$this->parControl,'reserva'=>$reserva,'servicios'=>$servicios,'insumos'=>$insumos,'pacientes'=>$pacientes,'domicilios'=>$domicilios,'formapagos'=>$formapagos];
        return view('reservas.modificar',$mergeData);
    }

    public function actualizar(Request $request, Reserva $reserva)
    {
        $request->validate([
            'hora'=>'required',
            'fecha'=>'required',
            'descripcion'=>'required',
            
           
            'servicio_id'=>'required',
            'insumo_id'=>'required',
            'pago_id'=>'required',
            'activo'=>'required',
        ]);
        $reserva->hora = $request->hora;
        $reserva->fecha = $request->fecha;
        $reserva->descripcion = $request->descripcion;
        $reserva->monto_insumos = $request->monto_insumos;
        $reserva->monto_servicios = $request->monto_servicios;
        $reserva->total = $request->total;
        $reserva->servicio_id = $request->servicio_id;
        $reserva->insumo_id = $request->insumo_id;
        $reserva->pago_id = $request->pago_id;
        $reserva->activo = $request->activo?true:false;
        $reserva->save();

        return redirect()->route('reservas.mostrar',$reserva->id);
    }

    public function eliminar($id)
    {
        $reserva = Reserva::find($id);
        $reserva->eliminado=true;
        $reserva->save();
        return redirect()->route('reservas.index');
    }
}
