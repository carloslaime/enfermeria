@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Mostrar Reserva</h2>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a class="btn btn-primary" href="{{route('reservas.index')}}">Listado</a>
                        <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                    </div>
                    <div class="ibox-content">
                        <form >
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Paciente:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="Text" class="form-control" name="paciente_id" value="{{$reserva->paciente}}" disabled="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Domicilio:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="Text" class="form-control" name="domicilio_id" value="{{$reserva->domicilio}}" disabled="">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hora:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" name="hora" value="{{$reserva->hora}}" disabled="">
                                </div>
                            </div>
                            
                            {{-- comienzo --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="fecha" value="{{$reserva->fecha}}" disabled="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Servicio:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="servicio_id" value="{{$reserva->servicio}}" disabled="">
                                </div>
                            </div>

                            {{-- fin --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descripción:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="descripcion" value="{{$reserva->descripcion}}" disabled="">
                                </div>
                            </div>
                           

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Insumo:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="Text" class="form-control" name="insumo_id" value="{{$reserva->insumo}}" disabled="">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Monto Servicios:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="monto_servicios" value="{{$reserva->monto_servicios}}" disabled="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Monto Insumos:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="monto_insumos" value="{{$reserva->monto_insumos}}" disabled="">
                                </div>
                            </div>
                       
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Total:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="total" value="{{$reserva->total}}" disabled="">
                                </div>
                            </div>
                         

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Forma de Pago:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="Text" class="form-control" name="pago_id" value="{{$reserva->formas_pagos}}" disabled="">
                                </div>
                            </div>
                        

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Activo</label>
                                <div class="col-sm-10">
                                    @if ($reserva->activo) 
                                        <span class="label label-primary">SI</span> 
                                    @else 
                                        <span class="label label-warning">NO</span> 
                                    @endif    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Creado</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{fecha_latina($reserva->created_at) }}" disabled=""></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@stop
