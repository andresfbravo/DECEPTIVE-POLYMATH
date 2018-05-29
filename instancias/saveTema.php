<?php
require_once '../classes/tema.php';
$tema = new Tema();
$tema->setNombre($_POST['nombretema']);
$_POST['dificultad'] = 1;
$tema->setCorte($_POST['corte']);
$tema->setDificultad($_POST['dificultad']);
$tema->setIdMateria($_POST['materia']);
$tema->saveTema();

?>
