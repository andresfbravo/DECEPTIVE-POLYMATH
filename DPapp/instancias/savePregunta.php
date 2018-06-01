<?php
require_once '../classes/pregunta.php';
session_start();
$pregunta = new Pregunta();
$pregunta->setIdTema($_POST['tema']);
$pregunta->setIdMateria($_POST['materia']);
$pregunta->setDificultad($_POST['dificultad']);
$pregunta->setIdProfesor($_SESSION['username']);
$pregunta->setTipoPregunta($_POST['tipopregunta']);
$pregunta->setTextopregunta($_POST['textopregunta']);
#print_r($usuario);
$pregunta->savePregunta();
require_once '../classes/connection.php';
$connection = new Connection();
$textopregunta = $_POST['textopregunta'];
$query1 = $connection->getConnection()->prepare("SELECT * FROM \"Preguntas\" WHERE \"Textopregunta\" = '$textopregunta'");
$query1->execute();
$idPregunta=$query1->fetchAll();

$respuesta = new Respuesta();
#$respuesta->setIdRespuesta($_POST['respuesta']);
$respuesta->setIdPregunta($idPregunta[0]['IdPregunta']);
$respuesta->setRespuesta($_POST['textorespuesta']);

#print_r($usuario);

$respuesta->saveRespuesta();

?>
