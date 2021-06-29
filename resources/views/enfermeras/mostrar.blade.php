@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Mostrar Enfermera</h2>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a class="btn btn-primary" href="{{route('enfermeras.index')}}">Listado</a>
                        <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                    </div>
                    <div class="ibox-content">
                        <form >
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->nombres}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Primer Apellido</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->primer_apellido}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Segundo Apellido</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->segundo_apellido}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Genero</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->genero}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Carnet de identidad</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->ci}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Expedido(ci)</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->ci_exp}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->fecha_nacimiento}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Celular</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->celular}}" disabled=""></div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->correo}}" disabled=""></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Especialidad</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$enfermera->especialidad}}" disabled=""></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Perfil</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="Enfermeras" disabled="">
                                </div>

                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    {{--<input type="text" class="form-control" value="{{$enfermera->estado_id}}" disabled=""></div>--}}
                                    @if ($enfermera->estado_id==1)
                                            <span class="label label-info">LIBRE</span>
                                        @elseif ($enfermera->estado_id==2)
                                            <span class="label label-warning">OCUPADA (ESTABLECIMIENTO)</span>
                                        @elseif ($enfermera->estado_id==3)
                                            <span class="label label-warning">OCUPADA (DOMICILIO)</span>
                                        @elseif ($enfermera->estado_id==4)
                                            <span class="label label-danger">AUSENTE</span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Activo</label>
                                <div class="col-sm-10">
                                    @if ($enfermera->activo) 
                                        <span class="label label-primary">SI</span> 
                                    @else 
                                        <span class="label label-warning">NO</span> 
                                    @endif    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Creado</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{fecha_latina($enfermera->created_at) }}" disabled=""></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@stop
