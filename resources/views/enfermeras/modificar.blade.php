@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Modificar Enfermera</h2>
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
                        <form action="{{route("enfermeras.actualizar",$enfermera)}}" method="post">
        
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nombres:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nombres" value="{{old('nombres',$enfermera->nombres)}}" required="">
                                </div>
                            </div>
                            @error('nombres')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            {{-- comienzo --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Primer Apellido:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="primer_apellido" value="{{old('primer_apellido',$enfermera->primer_apellido)}}" required="">
                                </div>
                            </div>
                            @error('primer_apellido')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            {{-- fin --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Segundo Apellido:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="segundo_apellido" value="{{old('segundo_apellido',$enfermera->segundo_apellido)}}" >
                                </div>
                            </div>
                            @error('segundo_apellido')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Genero:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="genero"  id="genero">
                                        <option value="M" @if(old('genero',$enfermera->genero)=='M') selected="" @endif>Masculino</option>
                                        <option value="F" @if(old('genero',$enfermera->genero)=='F') selected="" @endif>Femenino</option>
                                        <option value="O" @if(old('genero',$enfermera->genero)=='O') selected="" @endif>Otros</option>
                                    </select>
                                </div>
                            </div>
                            @error('genero')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Carnet de identidad:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ci" value="{{old('ci',$enfermera->ci)}}" required="">
                                </div>
                            </div>
                            @error('ci')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Expedido(ci):<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="ci_exp"  id="ci_exp">
                                        <option value="CH" @if(old('ci_exp',$enfermera->ci_exp)=='CH') selected="" @endif>Chuquisaca</option>
                                        <option value="LP" @if(old('ci_exp',$enfermera->ci_exp)=='LP') selected="" @endif>La Paz</option>
                                        <option value="CB" @if(old('ci_exp',$enfermera->ci_exp)=='CB') selected="" @endif>Cochabamba</option>
                                        <option value="OR" @if(old('ci_exp',$enfermera->ci_exp)=='OR') selected="" @endif>Oruro</option>
                                        <option value="PT" @if(old('ci_exp',$enfermera->ci_exp)=='PT') selected="" @endif>Potosi</option>
                                        <option value="TJ" @if(old('ci_exp',$enfermera->ci_exp)=='TJ') selected="" @endif>Tarija</option>
                                        <option value="SC" @if(old('ci_exp',$enfermera->ci_exp)=='SC') selected="" @endif>Santa Cruz</option>
                                        <option value="BE" @if(old('ci_exp',$enfermera->ci_exp)=='BE') selected="" @endif>Beni</option>
                                        <option value="PD" @if(old('ci_exp',$enfermera->ci_exp)=='PD') selected="" @endif>Pando</option>
                                        
                                    </select>
                                </div>
                            </div>
                            @error('ci_exp')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha de nacimiento:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fecha_nacimiento" value="{{old('fecha_nacimiento',$enfermera->fecha_nacimiento)}}" required="">
                                </div>
                            </div>
                            @error('fecha_nacimiento')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Celular:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="celular" value="{{old('celular',$enfermera->celular)}}" required="">
                                </div>
                            </div>
                            @error('celular')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Correo:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="correo" value="{{old('correo',$enfermera->correo)}}" >
                                </div>
                            </div>
                            @error('correo')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
               
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Especialidad:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="especialidad" value="{{old('especialidad',$enfermera->especialidad)}}" >
                                </div>
                            </div>
                            @error('especialidad')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Estado:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="estado_id"  id="estado_id">
                                        <option value="" ></option>
                                        @foreach ($estadoenfermeras as $estadoenfermera)
                                            <option value="{{$estadoenfermera->id}}" @if(old('estado_id',$enfermera->estado_id)==$estadoenfermera->id) selected="" @endif >{{$estadoenfermera->estado}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('estado_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Activo:</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <label> <input type="radio" value="1" name="activo" @if(old('activo',$enfermera->activo)=='1') checked="" @endif> <i></i>SI</label>
                                        <label> <input type="radio" value="0" name="activo" @if(old('activo',$enfermera->activo)=='0') checked="" @endif> <i></i>NO</label>
                                    </div>
                                </div>
                            </div>
                            @error('activo')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-success " type="submit">Guardar</button>
                                    <button class="btn btn-danger " type="button" onclick="location.href='{{route('enfermeras.index')}}'">Cancelar</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@stop