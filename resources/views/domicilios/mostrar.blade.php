@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Mostrar Domicilio</h2>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a class="btn btn-primary" href="{{route('domicilios.index')}}">Listado</a>
                        <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                    </div>
                    <div class="ibox-content">
                        <form >
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Avenida:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="avenida" value="{{$domicilio->avenida}}" disabled="">
                                </div>
                            </div>
                           
                           
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Calle:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="calle" value="{{$domicilio->calle}}" disabled="">
                                </div>
                            </div>
                           

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Número</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$domicilio->numero}}" disabled=""></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">UV:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="uv" value="{{$domicilio->uv}}" disabled="">
                                </div>
                            </div>
                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Distrito:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="distrito" value="{{$domicilio->distrito}}" disabled="">
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Referencia:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="referencia" value="{{$domicilio->referencia}}" disabled="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Paciente:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="paciente" value="{{$domicilio->pacientess}}" disabled="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Activo</label>
                                <div class="col-sm-10">
                                    @if ($domicilio->activo) 
                                        <span class="label label-primary">SI</span> 
                                    @else 
                                        <span class="label label-warning">NO</span> 
                                    @endif    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Creado</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{fecha_latina($domicilio->created_at) }}" disabled=""></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@stop
