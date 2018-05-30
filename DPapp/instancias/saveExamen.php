<?php
require_once '../classes/examen.php';
session_start();
$examen = new Examen();
$examen->setIdProfesor($_POST['idprofesor']);
$examen->setIdMateria($_POST['materia']);
$examen->setIdTema($_SESSION['idtema']);
$examen->setDificultad($_POST['dificultad']);
$examen->setTipoPregunta($_POST['Tipo_pregunta']);
#$examen->setTextopregunta($_POST['textopregunta']);
#print_r($usuario);
$examen->saveExamen();

?>
