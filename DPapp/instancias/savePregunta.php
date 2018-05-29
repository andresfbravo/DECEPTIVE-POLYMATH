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

?>
