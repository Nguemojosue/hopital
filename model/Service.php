<?php
require('Database.php');
 Class Service{
	private $titre;
	private $type;
	private $localisation;
	private $categorie;
	private $duree;
	private $logo;
	private $description;
	private $prix;
	private $etoiles;
	private $typeservice;
	private $dates;

	 public function __construct($titre=null,$type=null,$localisation=null,$categorie=null,$duree=null,$logo=null,$description=null,$prix=null,$etoiles=null,$typeservice=null,$dates=null){
     	$this->titre = $titre;
     	$this->type = $type;
     	$this->localisation = $localisation;
     	$this->categorie = $categorie;
     	$this->duree = $duree;
     	$this->logo = $logo;
     	$this->description = $description;
     	$this->prix = $prix;
     	$this->etoiles = $etoiles;
     	$this->typeservice = $typeservice;
     	$this->dates = $dates;
     	$this->bd = Database::getConnexion();
     }

    public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO services(titre,type,localisation,categorie,duree,logo,detail,prix,etoiles,typeservice,dates)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
		$ins->execute(array($this->titre,$this->type,$this->localisation,$this->categorie,$this->duree,$this->logo,$this->description,$this->prix,$this->etoiles,$this->typeservice,$this->dates));
	}

	public function show($typeservice)
	{
		$req = $this->bd->query("SELECT * FROM services WHERE typeservice = '$typeservice' ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function showByType($typeservice, $typestage)
	{
		$req = $this->bd->query("SELECT * FROM services WHERE type = '$typestage' AND typeservice = '$typeservice' ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function showCategories()
	{
		$req = $this->bd->query("SELECT DISTINCT(categorie) FROM services ORDER BY categorie ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function showById($id)
	{
		$req = $this->bd->query("SELECT * FROM services WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function search($key, $typeS, $categorieS)
	{
		$req = $this->bd->query("SELECT * FROM services WHERE titre LIKE '$key%' AND typeservice = '$typeS' AND categorie = '$categorieS' ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}


}
?>