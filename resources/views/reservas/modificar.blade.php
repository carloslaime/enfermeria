@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Modificar Reserva</h2>
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
                        <form action="{{route("reservas.actualizar",$reserva)}}" method="post">
                            
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hora:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" name="hora" value="{{old('hora',$reserva->hora)}}" required="">
                                </div>
                            </div>
                            @error('hora')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            {{-- comienzo --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="fecha" value="{{old('fecha',$reserva->fecha)}}" required="">
                                </div>
                            </div>
                            @error('fecha')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            {{-- fin --}}

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Servicio:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="servicio_id"  id="servicio_id">
                                        <option value="" ></option>
                                        @foreach ($servicios as $servicio)
                                            <option value="{{$servicio->id}}" 
                                                @if(old('servicio_id',$reserva->servicio_id)==$servicio->id) selected="" 
                                                @endif >{{$servicio->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('servicio_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descripción:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="descripcion" value="{{old('descripcion',$reserva->descripcion)}}" >
                                </div>
                            </div>
                            @error('descripcion')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Insumo:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="insumo_id"  id="insumo_id">
                                        <option value="" ></option>
                                        @foreach ($insumos as $insumo)
                                            <option value="{{$insumo->id}}" 
                                                @if(old('insumo_id',$reserva->insumo_id)==$insumo->id) selected="" 
                                                @endif >{{$insumo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('insumo_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Forma de Pago:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="pago_id"  id="pago_id">
                                        <option value="" ></option>
                                        @foreach ($formapagos as $formapago)
                                            <option value="{{$formapago->id}}" 
                                                @if(old('pago_id',$reserva->pago_id)==$formapago->id) selected="" 
                                                @endif >{{$formapago->tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('pago_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Activo:</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <label> <input type="radio" value="1" name="activo" @if(old('activo',$reserva->activo)=='1') checked="" @endif> <i></i>SI</label>
                                        <label> <input type="radio" value="0" name="activo" @if(old('activo',$reserva->activo)=='0') checked="" @endif> <i></i>NO</label>
                                    </div>
                                </div>
                            </div>
                            @error('activo')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-success " type="submit">Guardar</button>
                                    <button class="btn btn-danger " type="button" onclick="location.href='{{route('reservas.index')}}'">Cancelar</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@stop