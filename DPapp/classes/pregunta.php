<?php
require_once 'connection.php';
/**
*
*/
class Pregunta
{
	private $IdTema;
	private $IdMateria;
	private $Dificultad;
	private $IdProfesor;
	private $Tipo_pregunta;
	private $Textopregunta;
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

	function getTextoPregunta(){
		return $this->Textopregunta;
	}

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

	public function setTextoPregunta($Textopregunta)
	{
		$this->Textopregunta = $Textopregunta;
	}


	public function savePregunta()
	{
		try{
			$connection = new Connection();
			$connection->getConnection()->beginTransaction();
			$query = $connection->getConnection()->prepare("INSERT INTO \"Preguntas\"(\"IdTema\",\"IdMateria\",\"Dificultad\", \"IdProfesor\", \"Tipo_Pregunta\", \"Textopregunta\") VALUES (:IdTema, :IdMateria, :Dificultad, :IdProfesor, :TipoPregunta, :Textopregunta)");

			$IdTema = $this->getIdTema();
			$IdMateria = $this->getIdMateria();
			$Dificultad = $this->getDificultad();
			$IdProfesor = $this->getIdProfesor();
			$Tipo_pregunta = $this->getTipoPregunta();
			$Textopregunta = $this->getTextoPregunta();
			$query->bindValue(':IdTema', $IdTema);
			$query->bindValue(':IdMateria', $IdMateria);
			$query->bindValue(':Dificultad', $Dificultad);
			$query->bindValue(':IdProfesor', $IdProfesor);
			$query->bindValue(':TipoPregunta', $Tipo_pregunta);
			$query->bindValue(':Textopregunta', $Textopregunta);
			$query->execute();
			$connection->getConnection()->commit();
			echo "<script>
			alert('Pregunta registrada exitosamente.');
			window.location.href = 'http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Vistaadministrador.php';
			</script>";

		} catch (PDOException $e){
			$connection->getConnection()-> rollback();
			#echo "Error en la inserccion ...".$e->getMessage();
			echo "<script>
			alert('Error al registrar, intente de nuevo.');
			window.location.href = 'http://localhost/deceptive-polymath/DPapp/Ingresarpregunta.php';
			</script>";


		}

	}
}
?>
