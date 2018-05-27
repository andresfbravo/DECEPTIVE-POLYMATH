<?php
require_once '../classes/usuario.php';
$usuario = new Usuario();
$usuario->setCedula($_POST['userid']);
$usuario->setTipoUsuario($_POST['tipo']);
$usuario->setNombre($_POST['nombre']);
$usuario->setNombre1($_POST['nombre1']);
$usuario->setApellido($_POST['apellido']);
#echo $usuario->getApellido();
$usuario->setApellido1($_POST['apellido1']);
$usuario->setEmail($_POST['email']);
$usuario->setPassword($_POST['password']);
$usertype = $usuario->getTipoUsuario();
if ($usertype == "Administrador"){
  $usuario->setTelefono($_POST['phone']);
}
if ($usertype == "Estudiante"){
  $usuario->setProgAcadem($_POST['progacadem']);
}
if ($usertype == "Profesor"){
  $usuario->setAsignatura($_POST['asignatura']);
}
print_r($usuario);
$usuario->saveUser();
?>
