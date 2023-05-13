<?php 
session_start();
if(!empty($_GET['id'])){
    $id = $_GET['id'];
}
if(!empty($_GET['idp'])){
    $idp = $_GET['idp'];
}
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
	<title>Hospital | Modifications</title>

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
                        echo 'Modification du patient';
                    }else if($_GET['type'] == 'chambre'){
                        echo 'Modification de la chambre';
                    }else if($_GET['type'] == 'hospi'){
                        echo 'Modification l\'hospitalisation';
                    }else{
                        echo 'Modification de la consultation';
                    }

                ?>         
            </div>
        <?php 
            if($_GET['type'] == 'patient'){

                $patient = new Patient();
                $rs = $patient->showById($id);

        ?>
            <form method="post">
                <input type="text" name="nom" id="nom" class="formx x2" placeholder="Entrez le nom du <?= $_GET['type'] ?>" value="<?= $rs['nom'] ?>">

                <input type="text" name="prenom" id="prenom" class="formx x2" placeholder="Entrez le prénom du <?= $_GET['type'] ?>" value="<?= $rs['prenom'] ?>">

                <input type="date" name="dates" id="dates" class="formx x2" value="<?= $rs['datenaissance'] ?>">

                <input type="text" name="adresse" id="adresse" class="formx x2" placeholder="Entrez l'adresse de residence du <?= $_GET['type'] ?>" value="<?= $rs['adresse'] ?>">

                <input type="number" name="phone" id="phone" class="formx x2" placeholder="Entrez le numéro de téléphone du <?= $_GET['type'] ?>" min=1 value="<?= $rs['tel'] ?>">

                <input type="email" name="email" id="email" class="formx x2" placeholder="Entrez l'email du <?= $_GET['type'] ?>" value="<?= $rs['email'] ?>">

                    <button class="boxed-btn3 x2" id="publier" name="modifpatient">Modifier le patient</button>

			</form>

            <?php 
                if(isset($_POST['modifpatient'])){

                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $date = $_POST['dates'];
                    $adresse = $_POST['adresse'];
                    $tel = $_POST['phone'];
                    $email = $_POST['email'];

                    if($nom != '' AND $prenom != '' AND $date != '' AND $adresse != '' AND $tel != '' AND $email != ''){

                        $patient = new Patient($nom, $prenom, $date, $adresse, $tel, $email);
                        $patient->modif($id);

                        echo '<div class="success"> Patient Modifié </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }else if($_GET['type'] == 'chambre'){
            
                $chambre = new Chambre();
                $rs = $chambre->showById($id);

        ?>
            <form method="post">

                  <input type="text" name="numero" id="numero" class="formx x2" placeholder="Entrez le numero de la <?= $_GET['type'] ?>" value="<?= $rs['numero'] ?>">

                <select name="type" id="type" class="formx x2">
                    <option>VIP</option>
                    <option>Classique</option>
                    <option>Standard</option>
                </select>

                    <button class="boxed-btn3 x2" id="publier" name="modifchambre">Modifier la chambre</button>

            </form>

            <?php 
                if(isset($_POST['modifchambre'])){

                    $numero = $_POST['numero'];
                    $type = $_POST['type'];

                    if($numero != '' AND $type != '' ){

                        $chambre = new Chambre($numero, $type);
                        $chambre->modif($id);

                        echo '<div class="success"> Chambre Modifié </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }else if($_GET['type'] == 'hospi'){

                $hospitalisation = new Hospitalisation();
                $rs = $hospitalisation->showById($id);
        ?>
             <form method="post">

                <label for="entree">Date d'entrée</label>
                <input type="date" name="entree" id="entree" class="formx" value="<?= $rs['dateentree'] ?>">

                <label for="sortie">Date de sortie</label>
                <input type="date" name="sortie" id="sortie" class="formx" value="<?= $rs['datesortie'] ?>">

                <textarea placeholder="Traitement" class="formx detail" name="traitement"><?= $rs['traitement'] ?></textarea>


                    <button class="boxed-btn3" id="publier" name="modifhospi">Modifier l'hospitalisation</button>

            </form>
        <?php 

                  if(isset($_POST['modifhospi'])){

                    $entree = $_POST['entree'];
                    $sortie = $_POST['sortie'];
                    $traitement = $_POST['traitement'];

                    if($entree != '' AND $sortie != '' AND $traitement != ''){

                        $hospitalisation = new Hospitalisation($entree, $sortie, $traitement);
                        $hospitalisation->modif($id);

                        echo '<div class="success"> Hospitalisation modifié </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }else if($_GET['type'] == 'personnel'){

                $personnel = new Personnel();
                $rs = $personnel->showById($id);

             ?>
            <form method="post">
                <input type="text" name="nom" id="nom" class="formx x2" placeholder="Entrez le nom du <?= $_GET['type'] ?>" value="<?= $rs['nom'] ?>">

                <input type="text" name="prenom" id="prenom" class="formx x2" placeholder="Entrez le prénom du <?= $_GET['type'] ?>" value="<?= $rs['prenom'] ?>">

                <input type="date" name="dates" id="dates" class="formx x2" value="<?= $rs['datenaissance'] ?>">

                <input type="text" name="adresse" id="adresse" class="formx x2" placeholder="Entrez l'adresse de residence du <?= $_GET['type'] ?>" value="<?= $rs['adresse'] ?>">

                <input type="number" name="phone" id="phone" class="formx x2" placeholder="Entrez le numéro de téléphone du <?= $_GET['type'] ?>" min=1 value="<?= $rs['tel'] ?>">

                <input type="email" name="email" id="email" class="formx x2" placeholder="Entrez l'email du <?= $_GET['type'] ?>" value="<?= $rs['email'] ?>">

                <input type="password" name="password" id="password" class="formx x2" placeholder="Entrez le mot de passe du <?= $_GET['type'] ?>" value="<?= $rs['password'] ?>">

                 <select name="poste" id="poste" class="formx x2">
                    <option value="medecin">Medecin</option>
                    <option value="infirmiere">Infirmiere</option>
                    <option value="admin">Administrateur</option>
                </select>

                    <button class="boxed-btn3 x2" id="publier" name="modifpersonnel">Modifier le personnel</button>

            </form>

            <?php 
                if(isset($_POST['modifpersonnel'])){

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
                        $patient->modif($id);

                        echo '<div class="success"> Personnel modifié </div>';

                    }else{
                        echo '<div class="erreur"> Remplissez tous les champs </div>';
                    }

                   
                }

            }else if($_GET['type'] == 'consultation'){ 


            ?>
            <form method="post">
                 <select name="patient" id="patient" class="formx x2">
                    <option disabled>Patient</option>
                <?php 
                    $patient = new Consultation();
                    $result = $patient->showPatients();
                    $rs = $patient->showById($id);

                    foreach($result as $r){
                ?>
                    
                    <option value="<?= $r['id'] ?>" <?= ($r['id'] == $idp)?'selected':'' ?>><?= $r['nom'].' '.$r['prenom'] ?></option>

                <?php 
                    }
                ?>
                </select>

                <input type="date" name="dates" id="dates" class="formx x2" value="<?= $rs['dates'] ?>">

                <input type="time" name="heure" id="heure" class="formx x2" value="<?= $rs['heure'] ?>">

                <input type="text" name="diagnostic" id="diagnostic" class="formx x2" placeholder="Entrez le diagnostic de la <?= $_GET['type'] ?>" value="<?= $rs['diagnostic'] ?>">


                 <textarea placeholder="Traitement" class="formx detail x3" name="traitement"><?= $rs['traitement'] ?></textarea>

                    <button class="boxed-btn3 x2" id="publier" name="modifconsultation">Modifier la consultation</button>

            </form>

            <?php 
                if(isset($_POST['modifconsultation'])){

                    $id_patient = $_POST['patient'];
                    $dates = $_POST['dates'];
                    $heure = $_POST['heure'];
                    $diagnostic = $_POST['diagnostic'];
                    $traitement = $_POST['traitement'];


                    if($id_patient != '' AND $dates != '' AND $heure != '' AND $diagnostic != '' AND $traitement != ''){

                        $patient = new Consultation($id_patient, $dates, $heure, $diagnostic, $traitement);
                        $patient->modif($id);

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