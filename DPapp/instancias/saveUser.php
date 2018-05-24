<?php
require_once '../classes/usuario.php';
$usuario = new Usuario();
$usuario->setCedula($_POST['userid']);
$usuario->setTipoUsuario($_POST['tipo']);
$usuario->setNombre($_POST['nombre']);
$usuario->setNombre1($_POST['nombre1']);
$usuario->setApellido($_POST['apellido']);
echo $usuario->getApellido();
$usuario->setApellido1($_POST['apellido1']);
$usuario->setEmail($_POST['email']);
$usuario->setPassword($_POST['password']);
print_r($usuario);
$usuario->saveUser();
?>
