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
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
				<h1>Registrate!</h1>
			</div>
			<div class="col-lg-12 well">
				<form method="POST" action="instancias/saveUser.php">
					<fieldset>
						<p>
							<label for = "userid">Documento de Identificación: </label>
							<input type="text" class = "form-control" placeholder="Cedula de Ciudadania" id = "userid" name="userid" required = "true"/> 
						</p>
						<p>
							<label for="tipousuario">Tipo Usuario: </label>
							<select id="tipousuario" name="tipo" class="form-control" required="true">
								<option value="">Seleccione un tipo...</option>
								<option value="{Administrador}">Administrador</option>
								<option value="{Profesor}">Profesor</option>
								<option value="{Estudiante}">Estudiante</option>
							</select>
						</p>
						<p>
							<label for = "nombre">Primer Nombre: </label>
							<input type = "text" class="form-control" id="nombre" placeholder="Primer Nombre" name="nombre" required = "true"/> 
						</p>
						<p>
							<label for = "nombre1">Segundo Nombre: </label>
							<input type = "text" class="form-control" id="nombre1" placeholder="Segundo Nombre" name="nombre1"/> 
						</p>
						<p>
							<label for = "apellido">Primer Apellido: </label>
							<input type = "text" class="form-control" id="apellido" name="apellido" placeholder="Primer Apellido" required = "true"/> 
						</p>
						<p>
							<label for = "apellido1">Segundo Apellido: </label>
							<input type = "text" class="form-control" id="apellido1" placeholder="Segundo Apellido" name="apellido1"/> 
						</p>
						<p>
							<label for="email">E-mail:</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="true"/>
						</p>
						<p>
							<label for="password">Contraseña: </label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required="true"/>
						</p>
						<button type="submit" class="btn btn-primary">Registrar</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>