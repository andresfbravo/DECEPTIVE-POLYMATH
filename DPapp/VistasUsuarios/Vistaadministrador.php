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
if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 require_once 'barramenuadmin.php';

?>

<div id= "adminbody" class="container">
  <div class="row">
    <div class="jumbotron">
      <h1>Usuario Administrador</h1>
    </div>
    <div class="col-lg-12 well">
      <p class = "lead">
        Bienvenido estudiante usted tiene permisos de revisar pregunas de nuestra base de datos, realizar sugerencias de preguntas que considere deben estar en nuestra base de datos y generar examenes con las preguntas teniendo en cuenta la materia y el tema, revisar usuarios con permisos de eliminación, revisar sugerencias de preguntas, generar estadísticas, agregar preguntas y generar examenes.
      </p>
    </div>

  </div>

</div>
</body>
