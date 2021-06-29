@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>{{$parControl['titulo']}}</h2>
    </div>  
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a class="btn btn-primary" href="{{route('enfermeras.agregar')}}">Agregar</a>
                    <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                </div>
                <div class="ibox-content">
                    <form name="formBuscar" action="{{route("enfermeras.index")}}" method="get">
                        <div class="row">
                            <div class="col-sm-3 m-b-xs">
                                <div class="input-group">
                                    <input placeholder="Buscar" type="text" class="form-control form-control-sm" name="buscar" value="{{$buscar}}"> 
                                    <span class="input-group-append"> <button type="submit" class="btn btn-sm btn-success">Buscar</button> </span>
                                </div>
                            </div>
                            <div class="col-sm-7 m-b-xs" >&nbsp;</div>
                            <div class="col-sm-2 m-b-xs" style="float: right;">{{paginacion($parPaginacion)}}</div>
                        </div>
                    </form>
                    <div class="row"><div class="col-sm-12 m-b-xs"><span class="text-success">Total: <strong>{{$total}}</strong></span></div></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre Completo</th>
                                <th>Genero</th>
                                <th>CI</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Especialidad</th>
                                <th>Estado</th>
                                <th>Activo</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($enfermeras as $enfermera)
                                <tr>
                                    <td>{{$enfermera->id}}</td>
                                    <td>{{$enfermera->primer_apellido.' '.$enfermera->segundo_apellido.' '.$enfermera->nombres}}</td>
                                    <td>{{$enfermera->genero}}</td>
                                    <td>{{$enfermera->ci.' '.$enfermera->ci_exp}}</td>
                                    <td>{{$enfermera->fecha_nacimiento}}</td>
                                    <td>{{$enfermera->celular}}</td>
                                    <td>{{$enfermera->correo}}</td>
                                    <td>{{$enfermera->especialidad}}</td>
                                    <td>
                                        @if ($enfermera->estado_id==1)
                                            <span class="label label-info">LIBRE</span>
                                        @elseif ($enfermera->estado_id==2)
                                            <span class="label label-warning">OCUPADA (ESTABLECIMIENTO)</span>
                                        @elseif ($enfermera->estado_id==3)
                                            <span class="label label-warning">OCUPADA (DOMICILIO)</span>
                                        @elseif ($enfermera->estado_id==4)
                                            <span class="label label-danger">AUSENTE</span>
                                        @endif
                                    </td>
                                   <td>
                                        @if ($enfermera->activo) 
                                            <span class="label label-primary">SI</span> 
                                        @else 
                                            <span class="label label-warning">NO</span> 
                                        @endif
                                    </td>
                                    <td>{{fecha_latina($enfermera->created_at) }}</td>
                                    <td>{{fecha_latina($enfermera->updated_at) }}</td>
                                    <td data-texto="{{$enfermera->nombres}}">
                                        <a href="{{route('enfermeras.mostrar',$enfermera->id)}}" title="Mostrar"><img width="17px" src="{{asset('img/iconos/mostrar.png')}}" alt="Mostrar"></a>
                                        <a href="{{route('enfermeras.modificar',$enfermera->id)}}" title="Modificar"><img width="17px" src="{{asset('img/iconos/modificar.png')}}" alt="Modificar"></a>
                                        <a data-ruta="{{route('enfermeras.eliminar',$enfermera->id)}}" class="btn-eliminar" title="Eliminar"><img width="17px" src="{{asset('img/iconos/eliminar.png')}}" alt="Eliminar"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <form name="formEliminar" id="formEliminar"  action="" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Eliminar" hidden="">
                        </form>
                        <script>
                            $(document).ready(function(){
                                $('.btn-eliminar').click(function(){
                                    var ruta=$(this).data('ruta');
                                    var texto = $(this).closest('td').data('texto');
                                    var esEliminar = confirm('Esta seguro de eliminar el registro "'+texto+'"');
                                    if(esEliminar){
                                        $('#formEliminar').attr('action',ruta);
                                        document.formEliminar.submit();
                                    }
                                    
                                });
                            });
                        </script>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

