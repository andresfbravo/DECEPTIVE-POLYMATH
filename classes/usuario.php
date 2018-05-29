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
	private $asignatura;
	private $telefono;
	private $progacadem;
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
	function getAsignatura(){
		return $this->asignatura;
	}
	function getProgAcadem(){
		return $this->progacadem;
	}
	function getTelefono(){
		return $this->telefono;
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
	public function setAsignatura($asignatura)
	{
		$this->asignatura = $asignatura;
	}
	public function setProgAcadem($progacadem)
	{
		$this->progacadem = $progacadem;
	}
	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}

	public function saveUser()
	{
		try{
			$connection = new Connection();
			$connection->getConnection()->beginTransaction();
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
			$query->bindValue(':apellido', $apellido);
			$query->bindValue(':apellido1', $apellido1);
			$query->bindValue(':email', $email);
			$query->bindValue(':password', $password);
			$query->execute();
			if($tipo == "Administrador"){
				$telefono = $this->getTelefono();
				$queryadmin = $connection->getConnection()->prepare("INSERT INTO \"Administrador\" VALUES (:cedula, :tipo, :nombre, :nombre1, :apellido, :apellido1, :email, :password)");
				$queryadmin->bindValue(':cedula', $cedula);
				$queryadmin->bindValue(':tipo', $tipo);
				$queryadmin->bindValue(':nombre', $nombre);
				$queryadmin->bindValue(':nombre1', $nombre1);
				$queryadmin->bindValue(':apellido', $apellido);
				$queryadmin->bindValue(':apellido1', $apellido1);
				$queryadmin->bindValue(':email', $email);
				$queryadmin->bindValue(':password', $password);
				$queryadmin->execute();
				$queryphone = $connection->getConnection()->prepare("INSERT INTO \"Telefonos\" VALUES (:cedula,:telefono)");
				echo $cedula;
				$queryphone->bindValue(':cedula', $cedula);
				$queryphone->bindValue('telefono', $telefono);
				$queryphone->execute();
			}
			elseif ($tipo == "Profesor") {
				$asignatura = $this->getAsignatura();
				$queryprof = $connection->getConnection()->prepare("INSERT INTO \"Profesores\" VALUES (:cedula, :tipo, :nombre, :nombre1, :apellido, :apellido1, :email, :password, :asignatura)");
				$queryprof->bindValue(':cedula', $cedula);
				$queryprof->bindValue(':tipo', $tipo);
				$queryprof->bindValue(':nombre', $nombre);
				$queryprof->bindValue(':nombre1', $nombre1);
				$queryprof->bindValue(':apellido', $apellido);
				$queryprof->bindValue(':apellido1', $apellido1);
				$queryprof->bindValue(':email', $email);
				$queryprof->bindValue(':password', $password);
				$queryprof->bindValue(':asignatura', $asignatura);
				$queryprof->execute();
			}
			elseif ($tipo == "Estudiante") {
				$progacadem = $this->getProgAcadem();
				$queryest = $connection->getConnection()->prepare("INSERT INTO \"Estudiantes\" VALUES (:cedula, :tipo, :nombre, :nombre1, :apellido, :apellido1, :email, :password, :progacadem)");
				$queryest->bindValue(':cedula', $cedula);
				$queryest->bindValue(':tipo', $tipo);
				$queryest->bindValue(':nombre', $nombre);
				$queryest->bindValue(':nombre1', $nombre1);
				$queryest->bindValue(':apellido', $apellido);
				$queryest->bindValue(':apellido1', $apellido1);
				$queryest->bindValue(':email', $email);
				$queryest->bindValue(':password', $password);
				$queryest->bindValue(':progacadem', $progacadem);
				$queryest->execute();
			}
			$connection->getConnection()->commit();
			echo "<script>
			alert('Registro Exitoso.');
			window.location.href = 'http://localhost/deceptive-polymath/DPapp/';
			</script>";

		} catch (PDOException $e){
			$connection->getConnection()-> rollback();
			echo "Error en la inserccion ...".$e->getMessage();
			#echo "<script>
			#alert('Error al registrar, intente de nuevo.');
			#window.location.href = 'http://localhost/deceptive-polymath/DPapp/signup.php';
			#</script>";

		}

	}
}
?>
