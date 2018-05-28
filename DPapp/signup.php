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
	$usertype = null;
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
							<input type="number" class = "form-control" placeholder="Cedula de Ciudadania" id = "userid" name="userid" required = "true"/>
						</p>
						<p>

							<label for="tipousuario">Tipo Usuario: </label>
							<select id="tipousuario" name="tipo" class="form-control" required="true" onChange = "addfields(this)">
								<option value="">Seleccione un tipo...</option>
								<option value="Administrador">Administrador</option>
								<option value="Profesor">Profesor</option>
								<option value="Estudiante">Estudiante</option>
							</select>
						</p>
						<div class="admininfo" style= "display:none">
							<label> Introduzca un número (en digitos 0-9):
								<input type="number" class="form-control" id="phone" name="phone" required = "false"  pattern="\d*"/></input>
							 </label>
						</div>
						<div class="estudinfo" style= "display:none">
							<label> Introduzca su programa académico:
								<input type="text" class="form-control" id="progacadem" name="progacadem" required = "false" pattern= "\w+( |\w+)*"/></input>
							 </label>
						</div>
						<div class="profinfo" style= "display:none">
							<label> Introduzca la asignatura que imparte:
								<input type="text" class="form-control" id="asignatura" name="asignatura" required = "false" pattern= "\w+( |\w+)*"/></input>
							 </label>
						</div>
						<p>
							<label for = "nombre">Primer Nombre: </label>
							<input type = "text" class="form-control" id="nombre" placeholder="Primer Nombre" name="nombre" pattern= "\w+" required = "true"/>
						</p>
						<p>
							<label for = "nombre1">Segundo Nombre: </label>
							<input type = "text" class="form-control" id="nombre1" placeholder="Segundo Nombre" pattern= "\w+" name="nombre1"/>
						</p>
						<p>
							<label for = "apellido">Primer Apellido: </label>
							<input type = "text" class="form-control" id="apellido" name="apellido" placeholder="Primer Apellido" pattern= "\w+" required = "true"/>
						</p>
						<p>
							<label for = "apellido1">Segundo Apellido: </label>
							<input type = "text" class="form-control" id="apellido1" placeholder="Segundo Apellido" pattern= "\w+" name="apellido1"/>
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
		<script type="text/javascript" src="js/addinputs.js"></script>
</body>
</html>
