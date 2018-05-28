	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DP aplication</title>
	<!-- IMPORTAMOS NUESTROS ESTILOS FRAMEWORK DE BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme-min-css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- IMPORTAMOS LOS ARCHIVOS JS DEL FRAMEWORK DE BOOTSTRAP -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/Login.js"></script>
	<style type="text/css">
	fieldset{
		width: 30%;
		margin: 0 auto;
	}
	</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" rol="navigation">
	<?php
	session_start();
	if (isset($_SESSION['id'])) {
		require_once 'barramenu.php';
	}
	?>
	</div>
	<div class="container">
		<div class="row">
			<div class="jumbotron">
				<h1>Iniciar Sesion</h1>
			</div>
			<div class="col-lg-12 well">
				<!--<h1>HOLA MUNDO</h1>
				<button class="btn btn-lg btn-succes">Iniciar Sesion</button>-->
				<form>
					<fieldset>
						<p>
							<label for="username">Username:</label>
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control" id="username" placeholder="Nombre de Usuario" name="username" required="true"/>
						</p>
						<p>
							<label for="password">Password: </label>
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password"  class="form-control" id="password" placeholder="Contraseña" name="password" required="true"/>
						</p>
						<button type="button" class="btn btn-primary" id ="login">LogIn</button>
						<p>¿No estas registrado? <a href="signup.php">Registrate</a></p>
					</fieldset>
				</form>
			</div>
			<div class="col-xs-12 col sm-12 col-md-5 col-lg-4" id = "message">

			</div>
		</div>
	</div>
</body>
</html>
