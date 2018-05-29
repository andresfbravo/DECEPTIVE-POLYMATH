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
  <style type="text/css">
	fieldset{
		width: 30%;
		margin: 0 auto;
	}
	</style>
</head>
<body>
<?php
session_start();

if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 require_once 'VistasUsuarios/barramenuadmin.php';
?>
<div class="container">
  <div class="row">
    <div class="jumbotron">
      <h1>Ingresar Pregunta</h1>
    </div>
    <div class="col-lg-12 well">
      <form method="POST" action="instancias/saveUser.php">
        <fieldset>
          <p>
            <label for = "userid">Documento de Identificación: </label>
            <input type="number" min="999999" maxlength="10" class = "form-control" placeholder="Cedula de Ciudadania" id = "userid" name="userid" pattern="[0-9]*" required = "true"/>
          </p>

        </fieldset>
      </form>
    </div>
  </div>
</div>
</body>
</html>
