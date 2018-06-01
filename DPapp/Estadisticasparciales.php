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
  <style>
 table {
  width: 80%;
  color: #588c7e;
  font-family: monospace;
  font-size: 20px;
  text-align: center;
  margin-left: auto;
  margin-right: auto;
    }
 th {
  background-color: #588c7e;
  text-align: center;
  color: white;
   }

 tr:nth-child(even) {background-color: #f2f2f2}

 .btn-group {
    margin:0 auto;
    display:block;
  }
</style>

</head>
<body>
<div class="row">

</div>
<table style="margin-bottom: 30px;">
    <tr>
      <th>Id Parcial</th>
      <th>Cantidad de Preguntas</th>
      <th>Dificultad</th>
      <th>Vecesgenerado</th>
    </tr>
<?php
session_start();
if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 if($_SESSION['tipo_usuario'] == 'Administrador'):
  require_once 'VistasUsuarios/barramenuadmin.php';

elseif($_SESSION['tipo_usuario'] == 'Estudiante'):
 require_once 'VistasUsuarios/barramenuestudiante.php';
elseif($_SESSION['tipo_usuario'] == 'Profesor'):
 require_once 'VistasUsuarios/barramenuprof.php';
endif;
require_once 'classes/connection.php';
$connection = new Connection();
$idusuario = $_SESSION['username'];

$query = $connection->getConnection()->prepare("SELECT * FROM \"Examen\" WHERE \"IdUsuario\" = :IdUsuario");
$query->bindValue(':IdUsuario', $idusuario);
$query->execute();
$parciales = $query->fetchAll();
foreach($parciales as $parcial) {
    $string = '';
    $string .= "<tr><td>".$parcial['IdParcial'];
    $preguntas = $parcial['Preguntas'];
    $preguntas = str_replace('{','',$preguntas);
    $preguntas = str_replace('}','',$preguntas);
    $array = explode(",",$preguntas);
    $string .= "</td><td>".count($array);
    $string .= "</td><td>".$parcial['Dificultad'];
    $string .= "</td><td>".$parcial['Vecesgenerado']."</td></tr>";
    echo $string;
}
echo "</table>";
?>

</body>
</html>
