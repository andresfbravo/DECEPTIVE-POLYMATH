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
  font-size: 16 px;
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

</style>

</head>
<body>
<table>
    <tr>
      <th>Id de Pregunta</th>
      <th>Id de Tema</th>
      <th>Id de Materia</th>
      <th>Dificultad</th>
      <th>Id de Profesor</th>
      <th>Tipo de Pregunta</th>
      <th>Pregunta</th>
      <th></th>
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
$query = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" ORDER BY \"IdPregunta\"");
$query->execute();
$preguntas = $query->fetchAll();
#print_r($preguntas);
#echo "HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH";
foreach($preguntas as $pregunta) {
  #if($_SESSION['username'] != $pregunta['Cedula']){
    $string = '';
    $string .= "<tr><td>".$pregunta['IdPregunta'];
    $string .= "</td><td>".$pregunta['IdTema'];
    $string .= "</td><td>".$pregunta['IdMateria'];
    $string .= "</td><td>".$pregunta['Dificultad'];
    $string .= "</td><td>".$pregunta['IdProfesor'];
    $string .= "</td><td>".$pregunta['Tipo_Pregunta'];
    $string .= "</td><td>".$pregunta['Textopregunta']."</td>";
    echo $string;
   #}
if($_SESSION['tipo_usuario'] == 'Administrador'):
    echo "<td><a href='deletepregunta.php?idPregunta=".$pregunta['IdPregunta']."'onclick=\"return confirm('¿Está seguro de quere borrar esta pregunta?')\">Borrar</a></td></tr>";

elseif($_SESSION['tipo_usuario'] == 'Profesor'):
    echo "<td><a href='deletepregunta.php?idPregunta=".$pregunta['IdPregunta']."'onclick=\"return confirm('¿Está seguro de quere borrar esta pregunta?')\">Borrar</a></td></tr>";
endif;


}
echo "</table>";


?>
</table>

</body>
</html>
