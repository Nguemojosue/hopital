<?php
require('Database.php');
class User
{ 
	private $identifiant;
	private $statut;
	private $pass;
	private $access;

     
     public function __construct($identifiant=null,$statut=null,$pass=null,$access=null){
     	$this->identifiant = $identifiant;
     	$this->statut = $statut;
     	$this->pass = $pass;
     	$this->access = $access;
     	$this->bd = Database::getConnexion();
     }

	public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO users(identifiant,statut,pass,access,dates)VALUES(?,?,?,?,NOW())");
		$ins->execute(array($this->identifiant,$this->statut,$this->pass,$this->access));

	}

	public function show()
	{
		$req = $this->bd->query("SELECT * FROM users ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function showById($id)
	{
		$req = $this->bd->query("SELECT * FROM users WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function modif($id)
	{
		$req = $this->bd->prepare("UPDATE users SET identifiant = ? WHERE id=?");
		$result = $req->execute(array($this->identifiant,$id));

		$req = $this->bd->prepare("UPDATE users SET statut = ? WHERE id=?");
		$result = $req->execute(array($this->statut,$id));

		$req = $this->bd->prepare("UPDATE users SET pass = ? WHERE id=?");
		$result = $req->execute(array($this->pass,$id));

	}

	public function access($id,$access)
	{
		$req = $this->bd->prepare("UPDATE users SET access = ? WHERE id=?");
		$result = $req->execute(array($access,$id));

	}

	public function deletes($id)
	{
		$req = $this->bd->prepare("DELETE FROM users WHERE id=?");
		$req->execute(array($id));
	}

	public function connect($user,$pass)
	{
		$req = $this->bd->query("SELECT * FROM personnel WHERE email = '$user' AND password = '$pass'");
		$result = $req->fetchAll();

		return $result;
	}



}
?>

 <!-- LWS-550046

 R9e6DUSd -->