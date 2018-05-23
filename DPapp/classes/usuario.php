<?php
require_once 'connection.php';
/**
* 
*/
class Usuario
{
	private $cedula;
	private $tipo_usuario;
	private $nombre;
	private $nombre1;
	private $apellido;
	private $apellido1;
	private $email;
	private $password;
	function __construct()
	{
			
	}

	function getCedula(){
		return $this->cedula;
	}

	function getTipoUsuario(){
		return $this->tipo_usuario;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getNombre1(){
		return $this->nombre1;
	}

	function getApellido(){
		return $this->apellido;
	}

	function getApellido1(){
		return $this->apellido1;
	}

	function getEmail(){
		return $this->email;
	}

	function getPassword(){
		return $this->password;
	}

	public function setCedula($cedula)
	{
		$this->cedula = $cedula;
	}

	public function setTipoUsuario($tipo_usuario)
	{
		$this->tipo_usuario = $tipo_usuario;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function setNombre1($nombre1)
	{
		$this->nombre1 = $nombre1;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	public function setApellido1($apellido1)
	{
		$this->apellido1 = $apellido1;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function saveUser()
	{
		try{
					#$query = $connection->getConnection()->prepare("INSERT INTO \"Usuario\" VALUES ("this->cedula", "this->tipo", "this->nombre", "this->nombre1", "this->apellido", "this->apellido1", "this->email", "this->password")");
			$connection = new Connection();
			$query = $connection->getConnection()->prepare("INSERT INTO \"Usuario\" VALUES (:cedula, :tipo, :nombre, :nombre1, :apellido, :apellido1, :email, :password)");
			$cedula = $this->getCedula();
			$tipo = $this->getTipoUsuario();
			$nombre = $this->getNombre();
			$nombre1 = $this->getNombre1();
			$apellido = $this->getApellido();
			$apellido1 = $this->getApellido1();
			$email = $this->getEmail();
			$password = $this->getPassword();
			$query->bindValue(':cedula', $cedula);
			$query->bindValue(':tipo', $tipo);
			$query->bindValue(':nombre', $nombre);
			$query->bindValue(':nombre1', $nombre1);
			$query->bindValue(':apellido', $apellido1);
			$query->bindValue(':apellido1', $apellido1);
			$query->bindValue(':email', $email);
			$query->bindValue(':password', $password);
			$query->execute();
			echo "Registro exitoso";
		} catch (PDOException $e){
			echo "Error en la inserccion ...".$e->getMessage();
		}
	}
}
?>