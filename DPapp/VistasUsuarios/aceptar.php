<?php
session_start();
if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 $cedula = $_GET['id'];
require_once 'barramenuadmin.php';
require_once '../classes/connection.php';
$connection = new Connection();
$connection->getConnection()->beginTransaction();
try {
  $query = $connection->getConnection()->prepare("DELETE FROM \"Usuario\"    WHERE \"Cedula\" = $cedula");
  $query->execute();
  $connection->getConnection()->commit();
  header('location: http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarusuarios.php');
} catch (PDOException $e) {
  	$connection->getConnection()-> rollback();
    echo "<script>
    alert('Error al borrar usuario');
      window.location.href = 'location: http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarusuarios.php';
    </script>";
}

$pregunta = new Pregunta();
$pregunta->setIdTema($_POST['tema']);
$pregunta->setIdMateria($_POST['materia']);
$pregunta->setDificultad($_POST['dificultad']);
$pregunta->setIdProfesor($_SESSION['username']);
$pregunta->setTipoPregunta($_POST['tipopregunta']);
$pregunta->setTextopregunta($_POST['textopregunta']);
#print_r($usuario);
$pregunta->savePregunta();

?>
