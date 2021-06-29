@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Agregar Reserva</h2>
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
                        <form action="{{route("reservas.insertar")}}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Paciente:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="paciente_id"  id="paciente_id">
                                        <option value="" ></option>
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{$paciente->id}}" >{{$paciente->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('paciente_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                           {{-- --}} <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Domicilio:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="domicilio_id"  id="domicilio_id">
                                        <option value="" ></option>
                                        @foreach ($domicilios as $domicilio)
                                            <option value="{{$domicilio->id}}" >{{$domicilio->direccion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('domicilio_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hora:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" name="hora" value="{{old('hora')}}" required="">
                                </div>
                            </div>
                            @error('hora')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            {{-- comienzo --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}" required="">
                                </div>
                            </div>
                            @error('fecha')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            {{-- fin --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descripción:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}" >
                                </div>
                            </div>
                            @error('descripcion')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                           
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Servicio:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="servicio_id"  id="servicio_id">
                                        <option value="" ></option>
                                        @foreach ($servicios as $servicio)
                                            <option value="{{$servicio->id}}" >{{$servicio->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('servicio_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Insumo:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="insumo_id"  id="insumo_id">
                                        <option value="" ></option>
                                        @foreach ($insumos as $insumo)
                                            <option value="{{$insumo->id}}" >{{$insumo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('insumo_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            {{-- 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Monto Insumos:<i class="text-danger"></i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="monto_insumos"  disabled="">
                                </div>
                            </div>
                          

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Monto Servicios:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="monto_servicios"  disabled="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Total:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="total" disabled="">
                                </div>
                            </div>
                            @error('total')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            --}}

                            

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Forma de Pago:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="pago_id"  id="pago_id">
                                        <option value="" ></option>
                                        @foreach ($formapagos as $formapago)
                                            <option value="{{$formapago->id}}" >{{$formapago->tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('pago_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Activo</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <label> <input type="radio" value="1" name="activo" @if(old('activo')=='1') checked="" @endif> <i></i>SI</label>&nbsp;&nbsp;
                                        <label> <input type="radio" value="0" name="activo" @if(old('activo')=='0') checked="" @endif> <i></i>NO</label>
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
   {{--  <input type="hidden" id="urlPersonasActivas">
    <script>
        $(document).ready(function(){
            $('#txtPersona').keyup(function(){
                var nombre=$(this).val();
                if(nombre.length>=3){
                    $.get('{{route('enfermeras.personasActivas')}}?q='+nombre, function(data){
                        $("#txtPersona").typeahead(
                            { 
                                source:data,
                                afterSelect:function(item){
                                    $('#id').val(item.id);
                                }
                            }
                            );
                    },'json');    
                }else{
                    if(nombre.length==0){
                        $('#id').val('');
                    }
                }
                
            });
        });
    </script> --}}

@stop
