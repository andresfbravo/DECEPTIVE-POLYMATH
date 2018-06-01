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
  font-size: 12px;
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
      <th>Nombre del Tema</th>
      <th>Nombre de la Materia</th>
      <th>Dificultad</th>
      <th>Id de Profesor</th>
      <th>Tipo de Pregunta</th>
      <th>Pregunta</th>
      <th>Veces Utilizada</th>
      <th>Usada Por</th>
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
 $idpregunta = $_GET['idPregunta'];
$query = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"IdProfesor\" = $idusuario and \"IdPregunta\" = $idpregunta");
$query->execute();
$preguntas = $query->fetchAll();
#print_r($preguntas);
#echo "HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH";
foreach($preguntas as $pregunta) {
  #if($_SESSION['username'] != $pregunta['Cedula']){
  $nombrematquery = $connection->getConnection()->prepare("SELECT \"Nombre\" FROM \"Materia\" WHERE \"IdMateria\" =".$pregunta['IdMateria']);
  $nombrematquery->execute();
  $nombremat=$nombrematquery->fetchAll();
  $nombremat=$nombremat[0]['Nombre'];
  $nombretemaquery = $connection->getConnection()->prepare("SELECT \"NombreTema\" FROM \"Tema\" WHERE \"IdTema\" =".$pregunta['IdTema']);
  $nombretemaquery->execute();
  $nombretema=$nombretemaquery->fetchAll();
  $nombretema=$nombretema[0]['NombreTema'];

  $usadaquery = $connection->getConnection()->prepare("SELECT * FROM \"UsoPreguntas\" WHERE \"IdPregunta\" =".$pregunta['IdPregunta'] ." GROUP BY \"IdPregunta\", \"IdUsuario\"");
  $usadaquery->execute();
  $usopregunta = $usadaquery->fetchAll();


    $string = '';
    $string .= "<tr><td>".$pregunta['IdPregunta'];
    $string .= "</td><td>".$nombretema;
    $string .= "</td><td>".$nombremat;
    $string .= "</td><td>".$pregunta['Dificultad'];
    $string .= "</td><td>".$pregunta['IdProfesor'];
    $string .= "</td><td>".$pregunta['Tipo_Pregunta'];
    $string .= "</td><td>".$pregunta['Textopregunta'];
    $string .= "</td><td>".$pregunta['Vecesutilizada']."</td>";

    echo $string;
    echo "<td><table>";
    foreach ($usopregunta as $fila) {
    #print_r($fila);
    $nombreusurpadorquery = $connection->getConnection()->prepare("SELECT * FROM \"Usuario\" WHERE \"Cedula\" =".$fila['IdUsuario']);
    $nombreusurpadorquery->execute();
    $nombreusurpador= $nombreusurpadorquery->fetchAll();
    $usadaquery->execute();
    $usopregunta = $usadaquery->fetchAll();
    $stringuso = '';
    $stringuso .= "<tr><td>".$fila['IdUsuario']."</td>";
    $stringuso .= "<td>".$nombreusurpador[0]['Nombre']."</td>";
    $stringuso .= "<td>".$nombreusurpador[0]['Apellido']."</td></tr></table>";
    echo $stringuso;

    }
}
echo "</table>";
?>
</table>

</body>
</html>
