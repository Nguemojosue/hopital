<?php 
session_start();
require_once("../../model/Service.php");


	$service = new Service();

		$time = date('H:i');
		$day = date('d');
		$year = date('Y');

		$newMonth = 0;
		$tabMonth = array('Decembre','Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre');

		$M = date('m');
		if($M < 10){
			$newMonth = $M[1];
		}else{
			$newMonth = $M;
		}

		$finalDate = $day.' '.$tabMonth[$newMonth].' '.$year.' à '.$time;

	if(!empty($_FILES['photo']['name'])){


		$file = $_FILES['photo']['name'];
		$file_tmp = $_FILES['photo']['tmp_name'];

		$file_extension = strrchr($file, ".");

		$extension = array(".jpg",".JPG",".jpeg",".JPEG",".png",".PNG");

		$file_dest = '../serviceImage/'.$file;
		$file_dest2 = 'serviceImage/'.$file;

		 if(in_array($file_extension, $extension)){

		       if(move_uploaded_file($file_tmp, $file_dest)){

		       		$titre = htmlspecialchars(trim($_POST['titre']));
		       		$type = htmlspecialchars(trim($_POST['type']));
		       		$localisation = htmlspecialchars(trim($_POST['localisation']));
		       		$categorie = htmlspecialchars(trim($_POST['categorie']));
		       		$duree = htmlspecialchars(trim($_POST['duree']));
		       		$typeservice = htmlspecialchars(trim($_POST['typeservice']));
		       		$prix = htmlspecialchars(trim($_POST['prix']));
		       		$etoiles = htmlspecialchars(trim($_POST['etoiles']));
		       		$typeservice = htmlspecialchars(trim($_POST['typeservice']));
		       		$description = htmlspecialchars(trim($_POST['description']));

					$service = new Service($titre,$type,$localisation,$categorie,$duree,$file_dest2,$description,$prix,$etoiles,$typeservice,$finalDate);
					$service->create();

		      $reponse = 0;
		    }else{
		      $reponse = 1;
		    }

		   }else{
		     $reponse = 2;
		   }


	}

echo $reponse;

?>