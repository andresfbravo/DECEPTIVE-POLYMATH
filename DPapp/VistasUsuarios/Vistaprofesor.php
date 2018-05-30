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
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
#print_r($_SESSION);
if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 require_once 'barramenuprof.php';
?>

<div id= "adminbody" class="container">
  <div class="row">
    <div class="jumbotron">
      <h1>Usuario Profesor</h1>
    </div>
    <div class="col-lg-12 well">
      <p class = "lead">
        Bienvenido profesor usted tiene permisos de revisar pregunas de nuestra base de datos, realizar sugerencias de preguntas que considere deben estar en nuestra base de datos y generar examenes con las preguntas teniendo en cuenta la materia y el tema. Tenga en cuenta que usted puede eliminar preguntas que se encuentran en la base de datos.
      </p>
    </div>

  </div>

</div>
</body>
