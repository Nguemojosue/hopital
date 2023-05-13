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

	 public function __construct($titre=null,$type=null,$localisation=null,$categorie=null,$duree=null,$logo=null,$description=null,$prix=null,$etoiles=null){
     	$this->titre = $titre;
     	$this->type = $type;
     	$this->localisation = $localisation;
     	$this->categorie = $categorie;
     	$this->duree = $duree;
     	$this->logo = $logo;
     	$this->description = $description;
     	$this->prix = $prix;
     	$this->etoiles = $etoiles;
     	$this->bd = Database::getConnexion();
     }

    public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO services(titre,type,localisation,categorie,duree,logo,detail,prix,etoiles,dates)VALUES(?,?,?,?,?,?,?,?,?,NOW())");
		$ins->execute(array($this->titre,$this->type,$this->localisation,$this->categorie,$this->duree,$this->logo,$this->description,$this->prix,$this->etoiles));
	}


}
?>