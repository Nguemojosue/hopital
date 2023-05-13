<?php
require('Database.php');
class Chambre
{ 
	private $numero;
	private $type;

     
     public function __construct($numero=null,$type=null){
     	$this->numero = $numero;
     	$this->type = $type;
     	$this->bd = Database::getConnexion();
     }

	public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO chambre(numero,type,etat)VALUES(?,?,?)");
		$ins->execute(array($this->numero,$this->type,'Libre'));

	}

	public function show()
	{
		$req = $this->bd->query("SELECT * FROM chambre ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function showById($id)
	{
		$req = $this->bd->query("SELECT * FROM chambre WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function modif($id)
	{
		$req = $this->bd->prepare("UPDATE chambre SET numero = ?, type = ? WHERE id=?");
		$result = $req->execute(array($this->numero,$this->type,$id));

	}

	public function modifEtat($etat, $id)
	{
		$req = $this->bd->prepare("UPDATE chambre SET etat = ? WHERE id=?");
		$result = $req->execute(array($etat,$id));

	}

	public function delete($id)
	{
		$req = $this->bd->prepare("DELETE FROM chambre WHERE id=?");
		$req->execute(array($id));
	}



}
?>

 <!-- LWS-550046

 R9e6DUSd -->