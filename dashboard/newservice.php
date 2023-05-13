<?php 
session_start();
if(empty($_GET['page']) OR empty($_GET['type'])){
    header('location:dashboard.php?page=dash');

}else if(!empty($_GET['type']) AND $_GET['type'] == 'patient'){
require_once('../model/Patient.php');

}else if(!empty($_GET['type']) AND $_GET['type'] == 'chambre'){
require_once('../model/Chambre.php');

}else if(!empty($_GET['type']) AND $_GET['type'] == 'hospi'){
require_once('../model/Hospitalisation.php');

}else if(!empty($_GET['type']) AND $_GET['type'] == 'personnel'){
require_once('../model/Personnel.php');

}else if(!empty($_GET['type']) AND $_GET['type'] == 'consultation'){
require_once('../model/Consultation.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stagio | Nouveau service</title>

	<link rel="stylesheet" href="../css/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/style_dash.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
  <?php include('component/header.php'); ?>
  <?php include('component/navigation.php'); ?>


	<div class="content">
		<div class="entete">
			<div class="titredash">
                <?php 
                    if($_GET['type'] == 'patient'){
                        echo 'Nouveau patient';
                    }else if($_GET['type'] == 'chambre'){
                        echo 'Nouvelle chambre';
                    }else if($_GET['type'] == 'hospi'){
                        echo 'Nouvelle hospitalisation';
                    }else if($_GET['type'] == 'personnel'){
                        echo 'Nouveau personnel';
                    }else{
                        echo 'Nouvelle consultation';
                    }
                ?>         
            </div>

            <?php  if($_GET['type'] == 'patient'){ ?>
            <form method="post">
                <input type="text" name="nom" id="nom" class="formx x2" placeholder="Entrez le nom du <?= $_GET['type'] ?>">

                <input type="text" name="prenom" id="prenom" class="formx x2" placeholder="Entrez le prénom du <?= $_GET['type'] ?>">

                <input type="date" name="dates" id="dates" class="formx x2">

                <input type="text" name="adresse" id="adresse" class="formx x2" placeholder="Entrez l'adresse de residence du <?= $_GET['type'] ?>">

                <input type="number" name="phone" id="phone" class="formx x2" placeholder="Entrez le numéro de téléphone du <?= $_GET['type'] ?>" min=1>

                <input type="email" name="email" id="email" class="formx x2" placeholder="Entrez l'email du <?= $_GET['type'] ?>">

                    <button class="boxed-btn3 x2" id="publier" name="publier">Ajouter le patient</button>

			</form>

            <?php 
                if(isset($_POST['publier'])){

                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $date = $_POST['dates'];
                    $adresse = $_POST['adresse'];
                    $tel = $_POST['phone'];
                    $email = $_POST['email'];

                    if($nom != '' AND $prenom != '' AND $date != '' AND $adresse != '' AND $tel != '' AND $email != ''){

                        $patient = new Patient($nom, $prenom, $date, $adresse, $tel, $email);
                        $patient->create();

                        echo '<div class="success"> Patient ajouté </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }else if($_GET['type'] == 'chambre'){
        ?>
             <form method="post">

                <input type="text" name="numero" id="numero" class="formx x2" placeholder="Entrez le numero de la <?= $_GET['type'] ?>">

                <select name="type" id="type" class="formx x2">
                    <option>VIP</option>
                    <option>Classique</option>
                    <option>Standard</option>
                </select>


                    <button class="boxed-btn3 x2" id="publier" name="addchambre">Ajouter la chambre</button>

            </form>
        <?php 

                  if(isset($_POST['addchambre'])){

                    $numero = $_POST['numero'];
                    $type = $_POST['type'];

                    if($numero != '' AND $type != '' ){

                        $chambre = new Chambre($numero, $type);
                        $chambre->create();

                        echo '<div class="success"> Chambre ajouté </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }else if($_GET['type'] == 'hospi'){
        ?>
             <form method="post">

                <label for="entree">Date d'entrée</label>
                <input type="date" name="entree" id="entree" class="formx" >

                <label for="sortie">Date de sortie</label>
                <input type="date" name="sortie" id="sortie" class="formx" >

                <textarea placeholder="Traitement" class="formx detail" name="traitement"></textarea>


                    <button class="boxed-btn3" id="publier" name="addhospi">Ajouter l'hospitalisation</button>

            </form>
        <?php 

                  if(isset($_POST['addhospi'])){

                    $entree = $_POST['entree'];
                    $sortie = $_POST['sortie'];
                    $traitement = $_POST['traitement'];

                    if($entree != '' AND $sortie != '' AND $traitement != ''){

                        $hospitalisation = new Hospitalisation($entree, $sortie, $traitement);
                        $hospitalisation->create();

                        echo '<div class="success"> Hospitalisation ajouté </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }else if($_GET['type'] == 'personnel'){ ?>
            <form method="post">
                <input type="text" name="nom" id="nom" class="formx x2" placeholder="Entrez le nom du <?= $_GET['type'] ?>">

                <input type="text" name="prenom" id="prenom" class="formx x2" placeholder="Entrez le prénom du <?= $_GET['type'] ?>">

                <input type="date" name="dates" id="dates" class="formx x2">

                <input type="text" name="adresse" id="adresse" class="formx x2" placeholder="Entrez l'adresse de residence du <?= $_GET['type'] ?>">

                <input type="number" name="phone" id="phone" class="formx x2" placeholder="Entrez le numéro de téléphone du <?= $_GET['type'] ?>" min=1>

                <input type="email" name="email" id="email" class="formx x2" placeholder="Entrez l'email du <?= $_GET['type'] ?>">

                <input type="password" name="password" id="password" class="formx x2" placeholder="Entrez le mot de passe du <?= $_GET['type'] ?>">

                 <select name="poste" id="poste" class="formx x2">
                    <option value="medecin">Medecin</option>
                    <option value="infirmiere">Infirmiere</option>
                    <option value="admin">Administrateur</option>
                </select>

                    <button class="boxed-btn3 x2" id="publier" name="addpersonnel">Ajouter le personnel</button>

            </form>

            <?php 
                if(isset($_POST['addpersonnel'])){

                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $date = $_POST['dates'];
                    $adresse = $_POST['adresse'];
                    $tel = $_POST['phone'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $poste = $_POST['poste'];

                    if($nom != '' AND $prenom != '' AND $date != '' AND $adresse != '' AND $tel != '' AND $email != '' AND $password != ''){

                        $patient = new Personnel($nom, $prenom, $date, $adresse, $tel, $email, $password, $poste);
                        $patient->create();

                        echo '<div class="success"> Personnel ajouté </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }else if($_GET['type'] == 'consultation'){ ?>
            <form method="post">
                 <select name="patient" id="patient" class="formx x2">
                    <option disabled>Patient</option>
                <?php 
                    $patient = new Consultation();
                    $result = $patient->showPatients();

                    foreach($result as $rs){
                ?>
                    
                    <option value="<?= $rs['id'] ?>"><?= $rs['nom'].' '.$rs['prenom'] ?></option>

                <?php 
                    }
                ?>
                </select>

                <input type="date" name="dates" id="dates" class="formx x2">

                <input type="time" name="heure" id="heure" class="formx x2">

                <input type="text" name="diagnostic" id="diagnostic" class="formx x2" placeholder="Entrez le diagnostic de la <?= $_GET['type'] ?>" min=1>


                 <textarea placeholder="Traitement" class="formx detail x3" name="traitement"></textarea>

                    <button class="boxed-btn3 x2" id="publier" name="addconsultation">Ajouter la consultation</button>

            </form>

            <?php 
                if(isset($_POST['addconsultation'])){

                    $id_patient = $_POST['patient'];
                    $dates = $_POST['dates'];
                    $heure = $_POST['heure'];
                    $diagnostic = $_POST['diagnostic'];
                    $traitement = $_POST['traitement'];


                    if($id_patient != '' AND $dates != '' AND $heure != '' AND $diagnostic != '' AND $traitement != ''){

                        $patient = new Consultation($id_patient, $dates, $heure, $diagnostic, $traitement);
                        $patient->create();

                        echo '<div class="success"> Consultation ajouté </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }
        ?>
		</div>

	</div>

    <div class="ombre-load">
        <div class="loader"></div>
         Publication...
    </div>

    <script type="text/javascript" src="../script/jquery.js"></script>
	<script type="text/javascript" src="../script/script.js"></script>
</body>
</html>