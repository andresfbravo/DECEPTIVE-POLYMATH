<?php
class LoginUsers
{
	private static $instance;
	private $connection;
	private function __construct()
	{
		try
		{
			$this->connection = new PDO("pgsql:host=127.0.0.1;dbname=DP_database", "postgres", "1234");
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection->exec("SET CLIENT_ENCODING TO 'UTF8'");
		}
		catch(PDOException $e)
		{
			echo "Conexion Fallida...".$e->getMessage();
			die();
		}
	}
	public static function singleton()
	{
		if(!isset(self::$instance))
		{
			$miclase=__CLASS__;
			self::$instance=new $miclase;
		}
		return self::$instance;
	}
	public function Login($username, $pass, $rol)
	{
		//$pass=md5($pass);
		try
		{
			$query=$this->connection->prepare("SELECT * FROM ".$rol." WHERE "Cedula"=? AND "Password"=?");
			$query->bindParam(1, $username);
			$query->bindParam(2, $pass);
			$query->execute();
			if($query->rowCount()>0)
			{

				/*if($rol=="superadmin")
				{
					while($row=$query->fetchObject())
					{
						$_SESSION['id']=$row->idsuperadmin;
						$_SESSION['name']=$row->nombre1." ".$row->nombre2." ".$row->apellido1." ".$row->apellido2;
					}
					$_SESSION['dist']="superadmin";
					echo "1";
				}
				else
				{
					while($row=$query->fetchObject())
					{
						$_SESSION['id']=$row->iduser;
						$_SESSION['name']=$row->nombre1." ".$row->nombre2." ".$row->apellido1." ".$row->apellido2;
						$_SESSION['dist']=$row->codmun;
					}
					echo "2";
				}*/
			}
			else
			{
				echo "0";
			}
			$this->connection=null;
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
		}
	}
}
?>
