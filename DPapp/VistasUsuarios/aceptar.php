<?php
require_once 'Revisarsugerencias.php';
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
  $query->execute();
  $preguntaresult = $query->fetchAll();
  if(!$preguntaresult[0]['Aceptacion']){
  $updatesugerencia = $connection->getConnection()->prepare("UPDATE \"Sugerencia\" SET \"Aceptacion\" = 'true' WHERE \"IdSugerencia\" = $idsugerencia");
  $updatesugerencia->execute();

  #print_r($preguntaresult[0]);
  $connection->getConnection()->commit();
  $pregunta = new Pregunta();
  $pregunta->setIdTema($preguntaresult[0]['IdTema']);
  $pregunta->setIdMateria($preguntaresult[0]['IdMateria']);
  $pregunta->setDificultad($preguntaresult[0]['Dificultad']);
  $pregunta->setIdProfesor($_SESSION['username']);
  $pregunta->setTipoPregunta($preguntaresult[0]['Tipo_pregunta']);
  $pregunta->setTextopregunta($preguntaresult[0]['Textopregunta']);
  $pregunta->savePregunta();
  $textopregunta = $pregunta->getTextoPregunta();
  $query1 = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"Textopregunta\" = '$textopregunta'");
  $query1->execute();
  $idPregunta=$query1->fetchAll();

  $respuesta = new Respuesta();
  #$respuesta->setIdRespuesta($_POST['respuesta']);
  $respuesta->setIdPregunta($idPregunta[0]['IdPregunta']);
  $respuesta->setRespuesta($preguntaresult[0]['Textorespuesta']);

  #print_r($usuario);

  $respuesta->saveRespuesta();
  echo "<script>
  alert('Sugerencia aceptada correctamente.');
  window.location.href = 'http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarsugerencias.php';
  </script>";
}else{
  echo "<script>
  alert('La sugerencia ya había sido aceptada en la base de datos.');
  window.location.href = 'http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarsugerencias.php';
  </script>";
}
} catch (PDOException $e) {
  	$connection->getConnection()-> rollback();
    #echo "Error en la inserccion ...".$e->getMessage();
    echo "<script>
    alert('Error al aceptar sugerencia');
      window.location.href = 'location: http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Revisarusuarios.php';
    </script>";

}
?>
