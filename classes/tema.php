<?php
require_once 'connection.php';
/**
*
*/
class Tema
{
	private $nombre;
  private $corte;
  private $dificultad;
  private $idMateria;

	function __construct()
	{

	}

	function getNombre(){
		return $this->nombre;
	}
  function getCorte(){
    return $this->corte;
  }
  function getDificultad(){
    return $this->dificultad;
  }

  function getIdMateria(){
    return $this->idMateria;
  }

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
  public function setCorte($corte)
  {
    $this->corte = $corte;
  }
  public function setDificultad($dificultad)
  {
    $this->dificultad = $dificultad;
  }
  public function setIdMateria($idMateria)
  {
    $this->idMateria = $idMateria;
  }
	public function saveTema()
	{
		try{
			$connection = new Connection();
			$connection->getConnection()->beginTransaction();
			$query = $connection->getConnection()->prepare("INSERT INTO \"Tema\" (\"Corte\", \"Dificultad\", \"NombreTema\", \"IdMateria\") VALUES (:corte, :dificultad, :nombre, :idMateria)");

			$nombre = $this->getNombre();
			$corte = $this->getCorte();
			$dificultad = $this->getDificultad();
      $idMateria = $this->getIdMateria();
			$query->bindValue(':nombre', $nombre);
			$query->bindValue(':corte', $corte);
			$query->bindValue(':dificultad', $dificultad);
      $query->bindValue(':idMateria', $idMateria);
			$query->execute();
      $connection->getConnection()->commit();
      echo "<script>
      alert('Registro Exitoso.');
      window.location.href = 'http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Vistaadministrador.php';
      </script>";
		} catch (PDOException $e){
			$connection->getConnection()-> rollback();
			#echo "Error en la inserccion ...".$e->getMessage();
			echo "<script>
			alert('Error al registrar, intente de nuevo.');
			window.location.href = 'http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Ingresartema.php';
			</script>";

		}

	}
}
?>
