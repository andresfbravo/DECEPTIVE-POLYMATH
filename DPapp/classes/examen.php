<?php
require_once 'connection.php';
/**
*
*/
class Examen
{
	private $IdTema;
	private $IdMateria;
	private $Dificultad;
	private $IdProfesor;
	private $Tipo_pregunta;
	#private $Textopregunta;
	function __construct()
	{

	}

	function getIdTema(){
		return $this->IdTema;
	}

	function getIdMateria(){
		return $this->IdMateria;
	}

	function getDificultad(){
		return $this->Dificultad;
	}


	function getIdProfesor(){
		return $this->IdProfesor;
	}


	function getTipoPregunta(){
		return $this->Tipo_pregunta;
	}

	#function getTextoPregunta(){
	#	return $this->Textopregunta;
	#}

	public function setIdTema($IdTema)
	{
		$this->IdTema = $IdTema;
	}

	public function setIdMateria($IdMateria)
	{
		$this->IdMateria = $IdMateria;
	}

	public function setDificultad($Dificultad)
	{
		$this->Dificultad = $Dificultad;
	}

	public function setIdProfesor($IdProfesor)
	{
		$this->IdProfesor = $IdProfesor;
	}

	public function setTipoPregunta($Tipo_pregunta)
	{
		$this->Tipo_pregunta = $Tipo_pregunta;
	}

	#public function setTextoPregunta($Textopregunta)
	#{
	#	$this->Textopregunta = $Textopregunta;
	#}


	public function saveExamen()
	{
		try{

		} catch (PDOException $e){
			$connection->getConnection()-> rollback();
			echo "Error en la inserccion ...".$e->getMessage();
			/*echo "<script>
			alert('Error al registrar, intente de nuevo.');
			window.location.href = 'http://localhost/deceptive-polymath/DPapp/Ingresarpregunta.php';
			</script>";
			*/

		}

	}
}
?>