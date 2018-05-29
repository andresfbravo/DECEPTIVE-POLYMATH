<?php
require_once '../classes/materia.php';
$materia = new Materia();
$materia->setNombre($_POST['nombremat']);
$_POST['cantidad'] = null;
$_POST['dificultad'] = 1;
$_POST['id'] = 1;
$materia->setCantidad($_POST['cantidad']);
$materia->setDificultad($_POST['dificultad']);
$materia->saveMat();

?>
