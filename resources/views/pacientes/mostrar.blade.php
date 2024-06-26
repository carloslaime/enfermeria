@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Mostrar Paciente</h2>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a class="btn btn-primary" href="{{route('pacientes.index')}}">Listado</a>
                        <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                    </div>
                    <div class="ibox-content">
                        <form >
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->nombres}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Primer Apellido</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->primer_apellido}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Segundo Apellido</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->segundo_apellido}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Genero</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->genero}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Carnet de identidad</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->ci}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Expedido(ci)</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->ci_exp}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->fecha_nacimiento}}" disabled=""></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Celular</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->celular}}" disabled=""></div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->correo}}" disabled=""></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ocupación</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->ocupacion}}" disabled=""></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Perfil</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="Pacientes" disabled="">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Login</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{$paciente->login}}" disabled=""></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pass</label>
                                <div class="col-sm-10"><input type="password" class="form-control" value="{{$paciente->pass}}" disabled=""></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Activo</label>
                                <div class="col-sm-10">
                                    @if ($paciente->activo) 
                                        <span class="label label-primary">SI</span> 
                                    @else 
                                        <span class="label label-warning">NO</span> 
                                    @endif    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Creado</label>
                                <div class="col-sm-10"><input type="text" class="form-control" value="{{fecha_latina($paciente->created_at) }}" disabled=""></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@stop
