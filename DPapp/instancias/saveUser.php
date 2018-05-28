<?php
require_once '../classes/usuario.php';
$usuario = new Usuario();
$usuario->setCedula($_POST['userid']);
$usuario->setTipoUsuario($_POST['tipo']);
$usuario->setNombre($_POST['nombre']);
if($_POST['nombre1']==''){
	$_POST['nombre1'] = null;
}
$usuario->setNombre1($_POST['nombre1']);	
$usuario->setApellido($_POST['apellido']);
#echo $usuario->getApellido();
if($_POST['apellido1']==''){
	$_POST['apellido1'] = null;
}
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
