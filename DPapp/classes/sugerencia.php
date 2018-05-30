<?php
require_once 'connection.php';
/**
*
*/
class Sugerencia
{
	private $IdTema;
	private $IdMateria;
	private $Dificultad;
  private $Corte;
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
  function getCorte(){
		return $this->Corte;
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
  public function setCorte($Corte)
	{
		$this->Corte = $Corte;
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


	public function saveSugerencia()
	{
		try{
			$connection = new Connection();
			$connection->getConnection()->beginTransaction();
			$query = $connection->getConnection()->prepare("INSERT INTO \"Sugerencia\"(\"Nombre\",\"IdTema\",\"Dificultad\",\"IdMateria\",\"Corte\", \"IdUsuario\",\"Fecha\", \"Tipo_pregunta\", \"Textopregunta\", \"Aceptacion\", \"NombreTema\") VALUES (:Nombre, :IdTema, :Dificultad, :IdMateria, :Corte, :IdUsuario, :Fecha, :TipoPregunta, :Textopregunta, :Aceptacion, :NombreTema)");

			$IdTema = $this->getIdTema();
      $IdUsuario = $_SESSION['username'];
      $querycorte = 	$connection->getConnection()->prepare("SELECT \"NombreTema\",\"Corte\" FROM \"Tema\" WHERE \"IdTema\" = $IdTema");
      $date = date('r');
      $IdMateria = $this->getIdMateria();
      $querymateria = 	$connection->getConnection()->prepare("SELECT \"Nombre\" FROM \"Materia\" WHERE \"IdMateria\" = $IdMateria");
      $date = date('r');
      $querymateria->execute();
      $materiaresult = $querymateria->fetchAll();
      $Nombre = $materiaresult[0]['Nombre'];
      $Fecha =  $date;
      print_r($Fecha);
      $querycorte->execute();
      $Dificultad = $this->getDificultad();
      $Corteresult = $querycorte->fetchAll();
      $Corte = $Corteresult[0]['Corte'];
      $NombreTema = $Corteresult[0]['NombreTema'];
      $Aceptacion = "false";
			$IdProfesor = $this->getIdProfesor();
			$Tipo_pregunta = $this->getTipoPregunta();
			$Textopregunta = $this->getTextoPregunta();
      $query->bindValue(':Nombre', $Nombre);
      $query->bindValue(':NombreTema', $NombreTema);
        $query->bindValue(':Dificultad', $Dificultad);
      $query->bindValue(':Aceptacion', $Aceptacion);
			$query->bindValue(':IdTema', $IdTema);
			$query->bindValue(':IdMateria', $IdMateria);
      $query->bindValue(':Corte', $Corte);
			$query->bindValue(':IdUsuario', $IdUsuario);
      $query->bindValue(':Fecha', $Fecha);
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
