<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Enfermería Marlen</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">    
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body background="{{asset('img/portadaenfermeria.jpg')}}" alt="" style="width:800px">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img src="{{asset('img/ENFERMERIA.png')}}" alt="" style="width:400px">
            </div>
            <h3>Sistema Administrador Enfermería "Marlen"</h3>
            <p>Inicio de Sesi&oacute;n</p>
            <form class="m-t" role="form" action="{{route('iniciar.session')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Mail Address" required="" name="login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <div class="form-group">
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="adm">ADMINISTRADOR</option>    
                        <option value="est">EMPLEADO</option>     
                    </select>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Iniciar Sesión</button>
                
            </form>
            <p class="m-t"> <small>Carlos Alberto Laime Navia &copy; 2021</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->

</body>

</html>
