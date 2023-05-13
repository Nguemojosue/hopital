<?php
require('Database.php');
class Patient
{ 
	private $nom;
	private $prenom;
	private $datenaiss;
	private $adresse;
	private $tel;
	private $email;

     
     public function __construct($nom=null,$prenom=null,$datenaiss=null,$adresse=null,$tel=null,$email=null){
     	$this->nom = $nom;
     	$this->prenom = $prenom;
     	$this->datenaiss = $datenaiss;
     	$this->adresse = $adresse;
     	$this->tel = $tel;
     	$this->email = $email;
     	$this->bd = Database::getConnexion();
     }

	public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO patient(nom,prenom,datenaissance,adresse,tel, email)VALUES(?,?,?,?,?,?)");
		$ins->execute(array($this->nom,$this->prenom,$this->datenaiss,$this->adresse,$this->tel,$this->email));

	}

	public function show()
	{
		$req = $this->bd->query("SELECT * FROM patient ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function showById($id)
	{
		$req = $this->bd->query("SELECT * FROM patient WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function modif($id)
	{
		$req = $this->bd->prepare("UPDATE patient SET nom = ?, prenom = ?, datenaissance = ?, adresse = ?, tel = ?, email = ? WHERE id=?");
		$result = $req->execute(array($this->nom,$this->prenom,$this->datenaiss,$this->adresse,$this->tel,$this->email,$id));

	}

	public function delete($id)
	{
		$req = $this->bd->prepare("DELETE FROM patient WHERE id=?");
		$req->execute(array($id));
	}



}
?>

 <!-- LWS-550046

 R9e6DUSd -->