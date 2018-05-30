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
    $string .= "</td><td>".$materia['Dificultad']."</td>";
    echo $string;
}
echo "</table>";
?>
</table>

</body>
</html>
