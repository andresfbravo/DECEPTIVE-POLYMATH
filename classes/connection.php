<?php
/**
*
*/
class Connection
{
	private $connection;

	function __construct()
	{
		try{
			$this->connection = new PDO("pgsql:host=127.0.0.1;dbname=DP_database", "postgres", "1234");
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection->exec("SET CLIENT_ENCODING TO 'UTF8'");
			//echo "Conexion Exitosa";
		} catch (PDOException $e){
			//echo "Conexion Fallida ...".$e->getMessage();
			die();
		}
	}

	public function getConnection()
	{
		return $this->connection;
	}
}
?>
