<?php
require_once 'connection.php';
/**
*
*/
class Materia
{
	private $nombre;
  private $cantidad;
  private $dificultad;


	function __construct()
	{

	}

	function getNombre(){
		return $this->nombre;
	}
  function getCantidad(){
    return $this->cantidad;
  }
  function getDificultad(){
    return $this->dificultad;
  }

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
  public function setCantidad($cantidad)
  {
    $this->cantidad = $cantidad;
  }
  public function setDificultad($dificultad)
  {
    $this->dificultad = $dificultad;
  }
	public function saveMat()
	{
		try{
			$connection = new Connection();
			$connection->getConnection()->beginTransaction();
			$query = $connection->getConnection()->prepare("INSERT INTO \"Materia\" VALUES (:nombre, :cantidad, :dificultad)");

			$nombre = $this->getNombre();
			$cantidad = $this->getCantidad();
			$dificultad = $this->getDificultad();
			$query->bindValue(':nombre', $nombre);
			$query->bindValue(':cantidad', $cantidad);
			$query->bindValue(':dificultad', $dificultad);
			$query->execute();
      $connection->getConnection()->commit();
      echo "<script>
      alert('Registro Exitoso.');
      window.location.href = 'http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Vistaadministrador.php';
      </script>";
		} catch (PDOException $e){
			$connection->getConnection()-> rollback();
		#	echo "Error en la inserccion ...".$e->getMessage();
			echo "<script>
			alert('Error al registrar, intente de nuevo.');
			window.location.href = 'http://localhost/deceptive-polymath/DPapp/VistasUsuarios/Ingresarmateria.php';
			</script>";

		}

	}
}
?>
