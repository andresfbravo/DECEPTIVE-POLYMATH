<?php
require_once 'connection.php';
/**
*
*/
class Respuesta{
	private $IdRespuesta;
	private $IdPregunta;
	private $Respuesta;
	function __construct()
	{

	}

	function getIdRespuesta(){
		return $this->IdRespuesta;
	}

	function getIdPregunta(){
		return $this->IdPregunta;
	}

	function getRespuesta(){
		return $this->Respuesta;
	}

	public function setIdRespuesta($IdRespuesta)
	{
		$this->IdRespuesta = $IdRespuesta;
	}

	public function setIdPregunta($IdPregunta)
	{
		$this->IdPregunta = $IdPregunta;
	}

	public function setRespuesta($Respuesta)
	{
		$this->Respuesta = $Respuesta;
	}

		public function saveRespuesta()
	{
		try{
			$connection = new Connection();
			$connection->getConnection()->beginTransaction();
			$query1 = $connection->getConnection()->prepare("INSERT INTO \"Respuestas\"(\"IdPregunta\",\"Respuesta\") VALUES (:IdPregunta, :Respuesta)");

			$IdPregunta = $this->getIdPregunta();
			$Respuesta = $this->getRespuesta();
			$query1->bindValue(':IdPregunta', $IdPregunta);
			$query1->bindValue(':Respuesta', $Respuesta);
			$query1->execute();
			$connection->getConnection()->commit();
			echo "<script>
			alert('Respuesta registrada exitosamente.');
			window.location.href = 'http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Vistaadministrador.php';
			</script>";

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
			$materiaquery = $connection->getConnection()->prepare("SELECT \"CantidadPreguntas\", \"Dificultad\" FROM \"Materia\" WHERE \"IdMateria\" = :IdMateria");
			$materiaquery->bindValue(':IdMateria', $IdMateria);
		 	$materiaquery->execute();
			$materiaresult = $materiaquery->fetchAll();
			$cantpreguntasmat = $materiaresult[0]['CantidadPreguntas'];
			$dificultadmat = $materiaresult[0]['Dificultad'];
			$dificultadmat = $dificultadmat * $cantpreguntasmat;
			$cantpreguntasmat = $cantpreguntasmat + 1;
			$dificultadmat = ($dificultadmat + $Dificultad) / $cantpreguntasmat;
			$dificultadmat = round($dificultadmat);
			$updatemat = $connection->getConnection()->prepare("UPDATE \"Materia\" SET \"CantidadPreguntas\" = $cantpreguntasmat, \"Dificultad\" = $dificultadmat WHERE \"IdMateria\" = $IdMateria" );
			$updatemat->execute();
			$temaquery = $connection->getConnection()->prepare("SELECT \"CantidadPreguntas\", \"Dificultad\" FROM \"Tema\" WHERE \"IdMateria\" = :IdMateria");
			$temaquery->bindValue(':IdMateria', $IdMateria);
			$temaquery->execute();
			$temaresult = $temaquery->fetchAll();
			$cantpreguntastema = $temaresult[0]['CantidadPreguntas'];
			$dificultadtema = $temaresult[0]['Dificultad'];
			$dificultadtema = $dificultadtema * $cantpreguntastema;
			$cantpreguntastema = $cantpreguntastema + 1;
			$dificultadtema = ($dificultadtema + $Dificultad) / $cantpreguntastema;
			$dificultadtema = round($dificultadtema);
			$updatetema = $connection->getConnection()->prepare("UPDATE \"Tema\" SET \"CantidadPreguntas\" = $cantpreguntastema, \"Dificultad\" = $dificultadtema WHERE \"IdTema\" = $IdTema" );
			$updatetema->execute();
			$connection->getConnection()->commit();
			echo "<script>
			alert('Pregunta registrada exitosamente.');

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
