<?php 
class Database
{
	public static function getConnexion()
	{
		try
		{
			$bd = new PDO("mysql:host=localhost;dbname=hospital","root","");
		}
		catch(PDOEXception $e)
		{
			die("Erreur :".$e->getMessage());
		}

		return $bd;
	}
}

?>