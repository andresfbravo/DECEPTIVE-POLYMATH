<?php
require_once '../classes/sugerencia.php';
session_start();
$sugerencia = new Sugerencia();
$sugerencia->setIdTema($_POST['tema']);
$sugerencia->setIdMateria($_POST['materia']);
$sugerencia->setDificultad($_POST['dificultad']);
$sugerencia->setIdProfesor($_SESSION['username']);
$sugerencia->setCorte($_POST['corte']);
$sugerencia->setTipoPregunta($_POST['tipopregunta']);
$sugerencia->setTextopregunta($_POST['textopregunta']);
$sugerencia->setTextorespuesta($_POST['textorespuesta']);

#print_r($usuario);
$sugerencia->saveSugerencia();

?>
