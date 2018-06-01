	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DP aplication</title>
	<!-- IMPORTAMOS NUESTROS ESTILOS FRAMEWORK DE BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
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
							<label for="username">Cedula:</label>
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="number" min="999999" maxlength="10" class="form-control" id="username" placeholder="Cedula" name="username"  pattern="[0-9]*" required="true"/>
						</p>
						<p>
							<label for="password">Contraseña: </label>
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" minlength="8" maxlength="16" class="form-control" id="password" placeholder="Contraseña" name="password" required="true"/>
						</p>
						<button type="button" class="btn btn-primary" id ="login">Log In</button>
						<p>¿No estás registrado? <a href="signup.php">Regístrate</a></p>
					</fieldset>
				</form>
			</div>
			<div class="col-xs-12 col sm-12 col-md-5 col-lg-4" id = "message">

			</div>
		</div>
	</div>
</body>
</html>
