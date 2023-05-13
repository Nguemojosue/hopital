<?php
require('Database.php');
class Hospitalisation
{ 
	private $dateentree;
	private $datesortie;
	private $traitement;

     
     public function __construct($dateentree=null,$datesortie=null, $traitement = null){
     	$this->dateentree = $dateentree;
     	$this->datesortie = $datesortie;
     	$this->traitement = $traitement;
     	$this->bd = Database::getConnexion();
     }

	public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO hospitalisation(dateentree, datesortie, traitement)VALUES(?,?,?)");
		$ins->execute(array($this->dateentree,$this->datesortie, $this->traitement));

	}

	public function show()
	{
		$req = $this->bd->query("SELECT * FROM hospitalisation ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function showById($id)
	{
		$req = $this->bd->query("SELECT * FROM hospitalisation WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function modif($id)
	{
		$req = $this->bd->prepare("UPDATE hospitalisation SET dateentree = ?, datesortie = ?, traitement = ? WHERE id=?");
		$result = $req->execute(array($this->dateentree,$this->datesortie, $this->traitement,$id));

	}

	public function delete($id)
	{
		$req = $this->bd->prepare("DELETE FROM hospitalisation WHERE id=?");
		$req->execute(array($id));
	}



}
?>

 <!-- LWS-550046

 R9e6DUSd -->