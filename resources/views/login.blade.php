<!DOCTYPE html>
<html>
<head>
	<title>Enfermería Marlen</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v12/css/main.css">
<!--===============================================================================================-->
</head>

<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_v12/images/portenf.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" role="form" action="{{route('iniciar.session')}}" method="post">
					@csrf
					<div class="m-b-10" >
						<img src="{{asset('img/logotipomarlen.png')}}" alt="" style="width:240px">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						SISTEMA ENFERMERÍA MARLEN
					</span>

					<div class="wrap-input100 validate-input m-b-10" >
						<input class="input100" type="text"  placeholder="Usuario" required="" name="login">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" >
						<input class="input100" type="password" placeholder="Contraseña" required="" name="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					

					<div class="login100-form validate-form">
						<select class="login100-form-btn" name="tipo" id="tipo">
							<option value="adm">ADMINISTRADOR</option>    
							<option value="est">EMPLEADO</option>     
						</select>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit">
							Iniciar Sesión
						</button>
					</div>		
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>