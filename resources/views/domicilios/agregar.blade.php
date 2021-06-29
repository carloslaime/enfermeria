@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Agregar Domicilio</h2>
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
                        <form action="{{route("domicilios.insertar")}}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Avenida:<i class="text-danger"></i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="avenida" value="{{old('avenida')}}" required="">
                                </div>
                            </div>
                            @error('avenida')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                           
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Calle:<i class="text-danger"></i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="calle" value="{{old('calle')}}" required="">
                                </div>
                            </div>
                            @error('calle')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Numero:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="numero" value="{{old('numero')}}" required="">
                                </div>
                            </div>
                            @error('numero')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">UV:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="uv" value="{{old('uv')}}" required="">
                                </div>
                            </div>
                            @error('uv')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Distrito:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="distrito" value="{{old('distrito')}}" required="">
                                </div>
                            </div>
                            @error('distrito')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Referencia:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="referencia" value="{{old('referencia')}}" required="">
                                </div>
                            </div>
                            @error('referencia')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

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
                            
                           {{--  <hr>
                            <h1>Coordenadas</h1>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Latitud:<i class="text-danger"></i></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="latitud" value="{{old('latitud')}}" >
                                </div>
                                <label class="col-sm-2 col-form-label">Longitud:<i class="text-danger"></i></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="longitud" value="{{old('longitud')}}" >
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div id="mapa" style="width: 80%; height: 200px;"></div>
                            </div>
                            
                            <script>
                                function inciarMapa(){
                                    var latitud = -17.783262439834594; 
                                    var longitud = -63.18213147755178;
                                    coordenas = {
                                        lng: longitud,
                                        lat: latitud
                                    }
                                    generarMapa(coordenas);
                                }

                                function generarMapa(coordenadas){
                                    var mapa = new google.maps.Map(document.getElementById('mapa'),
                                    {
                                        zoom: 12,
                                        center: new google.maps.LatLng(coordenadas.lat,coordenadas.lng)
                                    });
                                    marcador = new google.maps.Marker({
                                        map: mapa,
                                        draggable: true,
                                        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
                                    });
                                    marcador.addListener('dragend',function(event){
                                        document.getElementById("latitud").value = this.getPosition().lat();
                                        document.getElementById("longitud").value = this.getPosition().lng();
                                    })
                                }
                            </script>
                            --}}
                            <script async defer src="https://maps.googleapis.com/maps/api/js?callback=iniciarMapa"></script>
                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-success " type="submit">Guardar</button>
                                    <button class="btn btn-danger " type="button" onclick="location.href='{{route('domicilios.index')}}'">Cancelar</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

   {{---  <input type="hidden" id="urlPacientesActivas">
    <script>
        $(document).ready(function(){
            $('#txtPaciente').keyup(function(){
                var nombre=$(this).val();
                if(nombre.length>=3){
                    $.get('{{route('domicilios.pacientesActivas')}}?q='+nombre, function(data){
                        $("#txtPaciente").typeahead(
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
    </script>---}}
@stop
 {{--<div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ubicación:<i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-info " type="button" onclick="findme()">Enviar mi ubicación actual</button>
                                        <div id="map" style="width: 30% height: 100px;"></div>
                                        <script> src=src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJxC-tnpF_rRzJOpGQ7XGF0EztcU1IR4U"</script>
                                        <script>
                                            function findme(){
                                                var output = document.getElementById('map');
                                                if(navigator.geolocation){
                                                    output.innerHTML = "Obteniendo ubicación, espere unos segundos...";
                                                    //<div class="alert alert-info">Navegador apto para Geolocalización</div>
                                                }else{
                                                    output.innerHTML = "Navegador no apto para Geolocalización";
                                                    //<div class="alert alert-info">Navegador no apto para Geolocalización</div>
                                                }
                                                function localizacion(posicion){
                                                    var latitude = posicion.coords.latitude;
                                                    var longitude = posicion.coords.longitude;
                                                    //output.innerHTML = "<p>Latitud: "+latitude+"<br>Longitud: "+longitude+"</p>";
                                                    var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center="+latitude+","+longitude+"&size=600x300&markers=color:red%7C"+latitude+","+longitude+"AIzaSyDJxC-tnpF_rRzJOpGQ7XGF0EztcU1IR4U";
				                                    output.innerHTML ="<img src='"+imgURL+"'>";
                                                }

                                                function error(){
                                                    output.innerHTML= "No se pudo obtener tu ubicación ";
                                                }
                                                navigator.geolocation.getCurrentPosition(localizacion,error);
                                            }
                                        </script>
                                    </div>
                            </div>
        
                            @error('ubicacion')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror--}}