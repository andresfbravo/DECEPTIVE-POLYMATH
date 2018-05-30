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
      <th>Nombre Materia</th>
      <th>Nombre Tema</th>
      <th>Dificultad</th>
      <th>Corte</th>
      <th>Cedula Usuario</th>
      <th>Fecha Sugerencia</th>
      <th>Tipo de Pregunta </th>
      <th>Texto de Pregunta</th>
      <th>Aceptacion</th>
      <th></th>
    </tr>
<?php

session_start();

if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
require_once 'barramenuadmin.php';
require_once '../classes/connection.php';
$connection = new Connection();
$query = $connection->getConnection()->prepare("SELECT * FROM \"Sugerencia\" ");
$query->execute();
$users = $query->fetchAll();
foreach($users as $user) {
  if($_SESSION['username'] != $user['Cedula']){
    $string = '';
    $string .= "<tr><td>".$user['Cedula'];
    $string .= "</td><td>".$user['TipoUsuario'];
    $string .= "</td><td>".$user['Nombre'];
    $string .= "</td><td>".$user['Apellido'];
    $string .= "</td><td>".$user['Email']."</td>";
    echo $string;
    echo "<td><a href='delete.php?id=".$user['Cedula']."'onclick=\"return confirm('¿Está seguro de quere borrar a este Usuario?')\">Borrar</a></td></tr>";
  }

}
echo "</table>";
?>
</table>

</body>
</html>
