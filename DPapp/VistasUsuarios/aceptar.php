<?php
session_start();
require_once '../classes/pregunta.php';
if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 $idsugerencia = $_GET['idsugerencia'];
require_once 'barramenuadmin.php';
require_once '../classes/connection.php';
$connection = new Connection();
$connection->getConnection()->beginTransaction();
try {
  $query = $connection->getConnection()->prepare("SELECT * FROM \"Sugerencia\"  WHERE \"IdSugerencia\" = $idsugerencia");
  $updatesugerencia = $connection->getConnection()->prepare("UPDATE \"Sugerencia\" SET \"Aceptacion\" = 'true' WHERE \"IdSugerencia\" = $idsugerencia");
  $updatesugerencia->execute();
  $query->execute();
  $preguntaresult = $query->fetchAll();
  print_r($preguntaresult[0]);
  $connection->getConnection()->commit();
  $pregunta = new Pregunta();
  $pregunta->setIdTema($preguntaresult[0]['IdTema']);
  $pregunta->setIdMateria($preguntaresult[0]['IdMateria']);
  $pregunta->setDificultad($preguntaresult[0]['Dificultad']);
  $pregunta->setIdProfesor($_SESSION['username']);
  $pregunta->setTipoPregunta($preguntaresult[0]['Tipo_pregunta']);
  $pregunta->setTextopregunta($preguntaresult[0]['Textopregunta']);
  #print_r($usuario);
  $pregunta->savePregunta();
  header('location: http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarsugerencias.php');
} catch (PDOException $e) {
  	$connection->getConnection()-> rollback();
    #echo "Error en la inserccion ...".$e->getMessage();
    echo "<script>
    alert('Error al aceptar sugerencia');
      window.location.href = 'location: http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarusuarios.php';
    </script>";
    
}



?>
