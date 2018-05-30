<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DP aplication</title>
	<!-- IMPORTAMOS NUESTROS ESTILOS FRAMEWORK DE BOOTSTRAP -->

	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- IMPORTAMOS LOS ARCHIVOS JS DEL FRAMEWORK DE BOOTSTRAP -->

<script type="text/javascript" src="../js/jquery.min.js"></script>

	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<style type="text/css">
  .btn-group button {
      background-color: #5cb85c; /* Green background */
      border: 1px solid blue; /* Green border */
      color: black; /* White text */
      padding: 24px 24px; /* Some padding */
      cursor: pointer; /* Pointer/hand icon */
      width: 100%; /* Set a width if needed */
      display: block; /* Make the buttons appear below each other */
  }

  .btn-group button:not(:last-child) {
      border-bottom: none; /* Prevent double borders */
  }

  /* Add a background color on hover */
  .btn-group button:hover {
      background-color: #1619e3;
  }
  a:link {
color: #FAFAFA;
}
a:hover {
color: #FAFAFA;
}
	</style>
</head>
<body>
  <?php

  session_start();

  if(!($_SESSION['login'])){
    header('location: http://localhost/deceptive-polymath/DPapp/');
   }
   if($_SESSION['tipo_usuario'] == 'Administrador'):
    require_once '../VistasUsuarios/barramenuadmin.php';
  elseif($_SESSION['tipo_usuario'] == 'Estudiante'):
   require_once '../VistasUsuarios/barramenuestudiante.php';
  elseif($_SESSION['tipo_usuario'] == 'Profesor'):
   require_once '../VistasUsuarios/barramenuprof.php';
  endif;
  require_once '../classes/connection.php';
?>
	<div class="container">
		<div class="row">
			<div class="jumbotron">
				<h1>Generar Estadísticas</h1>
			</div>
      <div class="btn-group" style="width:100%">
      <a href="/deceptive-polymath/DPapp/VistasUsuarios/Estadisticaspreguntas.php" style="color: #FAFAFA"><button style="color: #FAFAFA"> Por Pregunta</button></a>
      <a href="/deceptive-polymath/DPapp/VistasUsuarios/Estadisticasmaterias.php" style="color: #FAFAFA"><button style="color: #FAFAFA">Por Materia</button></a>
      <a href="/deceptive-polymath/DPapp/Ingresarpregunta.php" style="color: #FAFAFA"><button style="color: #FAFAFA">Por Parcial</button></a>
      </div>
		</div>
	</div>
</body>
</html>
