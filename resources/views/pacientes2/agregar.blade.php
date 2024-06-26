@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Agregar Paciente</h2>
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
                        <form action="{{route("pacientes.insertar")}}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Persona:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Persona" name="txtPersona" id="txtPersona" value="" class="typeahead_2 form-control" />
                                    <input type="hidden" name="id" id="id" value="{{old('id')}}">
                                    {{-- <input type="text" class="form-control" name="id" value="{{old('id')}}" required=""> --}}
                                </div>
                            </div>
                            @error('id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ocupación:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="ocupacion" value="{{old('ocupacion')}}" required="">
                                </div>
                            </div>
                            @error('ocupacion')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Domicilio:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Calle/Avenida" name="txtdomicilio_id" id="txtdomicilio_id" value="" class="typeahead_2 form-control" />
                                    <input type="hidden" name="domicilio_id" id="domicilio_id" value="{{old('domicilio_id')}}">
                                    {{-- <input type="text" class="form-control" name="id" value="{{old('id')}}" required=""> --}}
                                </div>
                            </div>
                            @error('domicilio_id')
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
                                    <button class="btn btn-danger " type="button" onclick="location.href='{{route('pacientes.index')}}'">Cancelar</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <input type="hidden" id="urlDomiciliosActivos">
    <script>
        $(document).ready(function(){
            $('#txtdomicilio_id').keyup(function(){
                var nombre=$(this).val();
                if(nombre.length>=3){
                    $.get('{{route('pacientes.domiciliosActivos')}}?q='+nombre, function(data){
                        $("#txtdomicilio_id").typeahead(
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
    </script>

@stop
