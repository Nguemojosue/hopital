<?php
class Me
{ 
	private $nom;
	private $prenom;
	private $datenaiss;
	private $adresse;
	private $tel;
	private $email;
	private $password;
	private $poste;

     
     public function __construct($nom=null,$prenom=null,$datenaiss=null,$adresse=null,$tel=null,$email=null,$password=null,$poste=null){
     	$this->nom = $nom;
     	$this->prenom = $prenom;
     	$this->datenaiss = $datenaiss;
     	$this->adresse = $adresse;
     	$this->tel = $tel;
     	$this->email = $email;
     	$this->password = $password;
     	$this->poste = $poste;
     	$this->bd = Database::getConnexion();
     }

	public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO personnel(nom,prenom,datenaissance,adresse,tel, email, password, poste)VALUES(?,?,?,?,?,?,?,?)");
		$ins->execute(array($this->nom,$this->prenom,$this->datenaiss,$this->adresse,$this->tel,$this->email,$this->password,$this->poste));

	}

	public function show($email)
	{
		$req = $this->bd->query("SELECT * FROM personnel WHERE email != '$email' ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function infos($email)
	{
		$req = $this->bd->query("SELECT * FROM personnel WHERE email = '$email'");
		$result = $req->fetch();

		return $result;
	}

	public function showById($id)
	{
		$req = $this->bd->query("SELECT * FROM personnel WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function countPersonnel($poste)
	{
		$req = $this->bd->query("SELECT * FROM personnel WHERE poste = '$poste'");
		$result = $req->rowCount();

		return $result;
	}

	public function countPatient()
	{
		$req = $this->bd->query("SELECT * FROM patient");
		$result = $req->rowCount();

		return $result;
	}

	public function countChambre()
	{
		$req = $this->bd->query("SELECT * FROM chambre");
		$result = $req->rowCount();

		return $result;
	}

	public function modif($id)
	{
		$req = $this->bd->prepare("UPDATE personnel SET nom = ?, prenom = ?, datenaissance = ?, adresse = ?, tel = ?, email = ?, password = ?, poste = ? WHERE id=?");
		$result = $req->execute(array($this->nom,$this->prenom,$this->datenaiss,$this->adresse,$this->tel,$this->email,$this->password,$this->poste,$id));

	}

	public function delete($id)
	{
		$req = $this->bd->prepare("DELETE FROM personnel WHERE id=?");
		$req->execute(array($id));
	}



}
?>

 <!-- LWS-550046

 R9e6DUSd -->