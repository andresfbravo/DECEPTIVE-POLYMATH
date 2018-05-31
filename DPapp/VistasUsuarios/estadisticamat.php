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

  <style>
 table {
  width: 80%;
  color: #588c7e;
  font-family: monospace;
  font-size: 20px;
  text-align: center;
  margin-left:10px;
  margin-right: 20 px;
    }
 th {
  background-color: #588c7e;
  text-align: center;
  color: white;
   }
 tr:nth-child(even) {background-color: #f2f2f2}

</style>

</head>
<body>
<table>
    <tr>
      <th>Nombre</th>
      <th>Cantidad de Preguntas</th>
      <th>Dificultad</th>
      <th>Preguntas Usadas</th>
    </tr>
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
$connection = new Connection();
$idusuario = $_SESSION['username'];
$idmateria = $_GET['idMateria'];
$query = $connection->getConnection()->prepare("SELECT * FROM \"Materia\" WHERE \"IdMateria\" = $idmateria");
$query->execute();
$materias = $query->fetchAll();
#print_r($materias);
#echo "HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH";
foreach($materias as $materia) {
#if($_SESSION['username'] != $materia['Cedula']){
    $string = '';
    $string .= "<tr><td>".$materia['Nombre'];
    $string .= "</td><td>".$materia['CantidadPreguntas'];
    $string .= "</td><td>".$materia['Dificultad'];
    $string .= "</td><td>".$materia['NumeroPreguntasUsadas']."</td></tr>";
    echo $string;
}
echo "</table>";
?>
</table>
<div class="Tabla1" style='display:none'>
  <table>
      <tr>
        <th>Id de Pregunta</th>
        <th>NombreTema</th>
        <th>Pregunta</th>
        <th>Veces Utilizada</th>
        <th></th>
      </tr>
  <?php
  $connection = new Connection();
  $idusuario = $_SESSION['username'];
  $idmateria = $_GET['idMateria'];
  $query = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"IdMateria\" = $idmateria and \"Vecesutilizada\" >=1 ");
  $query->execute();
  $preguntas = $query->fetchAll();
  #print_r($preguntas);
  #echo "HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH";
  foreach($preguntas as $pregunta) {
    $nombretemaquery = $connection->getConnection()->prepare("SELECT \"NombreTema\" FROM \"Tema\" WHERE \"IdTema\" =".$pregunta['IdTema']);
    $nombretemaquery->execute();
    $nombretema=$nombretemaquery->fetchAll();
    $nombretema=$nombretema[0]['NombreTema'];
      $string = '';
      $string .= "<tr><td>".$pregunta['IdPregunta'];
      $string .= "</td><td>".$nombretema;
      $string .= "</td><td>".$pregunta['Textopregunta'];
      $string .= "</td><td>".$pregunta['Vecesutilizada']."</td>";

      echo $string;
  }
  echo "</table>";


  ?>
  </table>
</div>

<div class="Tabla2">
  <table>
      <tr>
        <th>Id de Pregunta</th>
        <th>NombreTema</th>
        <th>Pregunta</th>
        <th>Veces Utilizada</th>
        <th></th>
      </tr>
  <?php
  $connection = new Connection();
  $idusuario = $_SESSION['username'];
  $idmateria = $_GET['idMateria'];
  $query = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"IdMateria\" = $idmateria ");
  $query->execute();
  $preguntas = $query->fetchAll();
  #print_r($preguntas);
  #echo "HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH";
  foreach($preguntas as $pregunta) {
    $nombretemaquery = $connection->getConnection()->prepare("SELECT \"NombreTema\" FROM \"Tema\" WHERE \"IdTema\" =".$pregunta['IdTema']);
    $nombretemaquery->execute();
    $nombretema=$nombretemaquery->fetchAll();
    $nombretema=$nombretema[0]['NombreTema'];
      $string = '';
      $string .= "<tr><td>".$pregunta['IdPregunta'];
      $string .= "</td><td>".$nombretema;
      $string .= "</td><td>".$pregunta['Textopregunta'];
      $string .= "</td><td>".$pregunta['Vecesutilizada']."</td>";

      echo $string;
  }
  echo "</table>";


  ?>
  </table>

</div>

</body>
</html>
