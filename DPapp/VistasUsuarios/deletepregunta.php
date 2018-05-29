<?php
session_start();
if(!($_SESSION['login'])){
  header('location: http://localhost/deceptive-polymath/DPapp/');
 }
 $idpregunta = $_GET['idPregunta'];
require_once 'barramenuprof.php';
require_once '../classes/connection.php';
$connection = new Connection();
$connection->getConnection()->beginTransaction();
try {
  $query = $connection->getConnection()->prepare("DELETE FROM \"Preguntas\"    WHERE \"IdPregunta\" = $idpregunta");
  $query->execute();
  $connection->getConnection()->commit();
  header('location: http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarpreguntas.php');
} catch (PDOException $e) {
  	$connection->getConnection()-> rollback();
    echo "<script>
    alert('Error al borrar pregunta');
      window.location.href = 'location: http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarpreguntas.php';
    </script>";
}


?>