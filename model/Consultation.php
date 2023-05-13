<?php
require('Database.php');
class Consultation
{ 
	private $idpatient;
	private $dates;
	private $heure;
	private $diagnostic;
	private $traitement;

     
     public function __construct($idpatient=null,$dates=null, $heure = null, $diagnostic = null, $traitement = null){
     	$this->idpatient = $idpatient;
     	$this->dates = $dates;
     	$this->heure = $heure;
     	$this->diagnostic = $diagnostic;
     	$this->traitement = $traitement;
     	$this->bd = Database::getConnexion();
     }

	public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO consultation(id_patient, dates, heure, diagnostic, traitement)VALUES(?,?,?,?,?)");
		$ins->execute(array($this->idpatient,$this->dates, $this->heure, $this->diagnostic, $this->traitement));

	}

	public function show()
	{
		$req = $this->bd->query("SELECT nom, prenom, dates, heure, diagnostic, traitement, patient.id as idp, consultation.id as idc  FROM consultation, patient WHERE patient.id = consultation.id_patient");
		$result = $req->fetchAll();

		return $result;
	}

	public function showPatients()
	{
		$req = $this->bd->query("SELECT * FROM patient ORDER BY nom ASC");
		$result = $req->fetchAll();

		return $result;
	}

		public function showPatientsById($idp)
	{
		$req = $this->bd->query("SELECT * FROM patient WHERE id = '$idp'");
		$result = $req->fetch();

		return $result;
	}

	public function showById($id)
	{
		$req = $this->bd->query("SELECT * FROM consultation WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function modif($id)
	{
		$req = $this->bd->prepare("UPDATE consultation SET id_patient = ?, dates = ?, heure = ?, diagnostic = ?, traitement = ? WHERE id=?");
		$result = $req->execute(array($this->idpatient,$this->dates,$this->heure,$this->diagnostic, $this->traitement,$id));

	}

	public function delete($id)
	{
		$req = $this->bd->prepare("DELETE FROM consultation WHERE id=?");
		$req->execute(array($id));
	}



}
?>

 <!-- LWS-550046

 R9e6DUSd -->