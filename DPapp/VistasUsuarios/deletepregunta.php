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
  $datosquery = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"IdPregunta\" = $idpregunta");
  $datosquery->execute();
  $datos = $datosquery->fetchAll();
  print_r($datosquery);
  $datos = $datos[0];
  $query = $connection->getConnection()->prepare("DELETE FROM \"Preguntas\"    WHERE \"IdPregunta\" = $idpregunta");
  $query->execute();
  $query1 = $connection->getConnection()->prepare("DELETE FROM \"Respuestas\"    WHERE \"IdPregunta\" = $idpregunta");
  $query1->execute();
  $IdMateria=$datos['IdMateria'];
  $IdTema = $datos['IdTema'];
  $Dificultad = $datos['Dificultad'];
  $materiaquery = $connection->getConnection()->prepare("SELECT \"CantidadPreguntas\", \"Dificultad\" FROM \"Materia\" WHERE \"IdMateria\" = :IdMateria");
  $materiaquery->bindValue(':IdMateria', $IdMateria);
  $materiaquery->execute();
  $materiaresult = $materiaquery->fetchAll();
  $cantpreguntasmat = $materiaresult[0]['CantidadPreguntas'];
  $dificultadmat = $materiaresult[0]['Dificultad'];
  $dificultadmat = $dificultadmat * $cantpreguntasmat;
  $cantpreguntasmat = $cantpreguntasmat - 1;
  $dificultadmat = ($dificultadmat - $Dificultad) / $cantpreguntasmat;
  if($dificultadmat <=0) $dificultadmat = 1;
  if($cantpreguntasmat <=0) $cantpreguntasmat = 0;
  $updatemat = $connection->getConnection()->prepare("UPDATE \"Materia\" SET \"CantidadPreguntas\" = $cantpreguntasmat, \"Dificultad\" = $dificultadmat WHERE \"IdMateria\" = $IdMateria" );
  $updatemat->execute();
  $temaquery = $connection->getConnection()->prepare("SELECT \"CantidadPreguntas\", \"Dificultad\" FROM \"Tema\" WHERE \"IdMateria\" = :IdMateria");
  $temaquery->bindValue(':IdMateria', $IdMateria);
  $temaquery->execute();
  $temaresult = $temaquery->fetchAll();
  $cantpreguntastema = $temaresult[0]['CantidadPreguntas'];
  $dificultadtema = $temaresult[0]['Dificultad'];
  $dificultadtema = $dificultadtema * $cantpreguntastema;
  $cantpreguntastema = $cantpreguntastema - 1;
  $dificultadtema = ($dificultadtema - $Dificultad) / $cantpreguntastema;
  if($dificultadtema <=0) $dificultadtema = 1;
  if($cantpreguntastema <=0) $cantpreguntastema = 0;
  $updatetema = $connection->getConnection()->prepare("UPDATE \"Tema\" SET \"CantidadPreguntas\" = $cantpreguntastema, \"Dificultad\" = $dificultadtema WHERE \"IdTema\" = $IdTema" );
  $updatetema->execute();
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
