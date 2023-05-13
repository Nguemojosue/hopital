<?php 
session_start();
if(!empty($_GET['page']) AND $_GET['page'] == 'patients'){
require_once('../model/Patient.php');

}else if(!empty($_GET['page']) AND $_GET['page'] == 'chambres'){
require_once('../model/Chambre.php');

}else if(!empty($_GET['page']) AND $_GET['page'] == 'hospi'){
require_once('../model/Hospitalisation.php');

}else if(!empty($_GET['page']) AND $_GET['page'] == 'personnel'){
require_once('../model/Personnel.php');

}else if(!empty($_GET['page']) AND $_GET['page'] == 'consultation'){
require_once('../model/Consultation.php');
}else{
   require_once('../model/Patient.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stagio | Dashboard</title>

	<link rel="stylesheet" href="../css/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/style_dash.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
  <?php include('component/header.php'); ?>
  <?php include('component/navigation.php'); ?>

<div class="content">
    <br>
<?php if(!empty($_GET['page']) AND $_GET['page'] == 'dash'){ ?>
	
		<!-- <div class="entete">
			<span class="titredash">Tableau de bord</span>
			
		</div> -->
        <div class="cards">
            <div class="card-item">
                <i class="fa fa-user-md big"></i>
                <div class="item-name">
                    <div class="nombre"><?php $poste = 'medecin'; $medecin = $me->countPersonnel($poste); echo $medecin; ?></div>
                    <div class="names">Medecins</div>
                </div>
            </div>

            <div class="card-item">
                <i class="fa fa-plus-square big"></i>
                <div class="item-name">
                    <div class="nombre"><?php $poste = 'infirmiere'; $medecin = $me->countPersonnel($poste); echo $medecin; ?></div>
                    <div class="names">Infirmier(e)s</div>
                </div>
            </div>

            <div class="card-item">
                <i class="fa fa-wheelchair big"></i>
                <div class="item-name">
                    <div class="nombre"><?php $medecin = $me->countPatient(); echo $medecin; ?></div>
                    <div class="names">Patients</div>
                </div>
            </div>

            <div class="card-item">
                <i class="fa fa-bed big"></i>
                <div class="item-name">
                    <div class="nombre"><?php $medecin = $me->countChambre(); echo $medecin; ?></div>
                    <div class="names">Chambres</div>
                </div>
            </div>

        </div>

<?php }else if(!empty($_GET['page']) AND $_GET['page'] == 'patients'){ ?>

<div class="entete">
    <span class="titredash">Patients</span>
    <?php if($infos['poste'] != 'infirmiere'){ ?>
        <button onclick="self.location.href='newservice.php?page=patients&type=patient'" class="boxed-btn3 right"><i class="fa fa-plus"></i> Nouveau patient</button>
    <?php } ?>
</div>

<div class="table">
                <div class="tr black">
                    <div class="th black">Numéro</div>
                    <div class="th black">Nom et Prénom</div>
                    <div class="th black">Naissance</div>
                    <div class="th black">Adresse</div>
                    <div class="th black">Téléphone</div>
                    <div class="th black">Email</div>
                    <div class="th black">Action</div>
                </div>
                <?php 
                    $count = 0;
                    $patient = new Patient();
                    $result = $patient->show();
                    $cont = count($result);
                    if($cont > 0){
                    foreach($result as $rs){
                ?>
                <div class="tr patient<?= (($count % 2) == 1)?' gray':' ' ?>">
                    <div class="td"><?= $count + 1 ?></div>
                    <div class="td"><?= $rs['nom'].' '.$rs['prenom'] ?></div>
                    <div class="td"><?= $rs['datenaissance'] ?></div>
                    <div class="td"><?= $rs['adresse'] ?></div>
                    <div class="td"><?= $rs['tel'] ?></div>
                    <div class="td"><?= $rs['email'] ?></div>
                    <div class="td">
                      <?php if($infos['poste'] != 'infirmiere'){ ?>
                            <a href="modif.php?page=patients&type=patient&id=<?= $rs['id'] ?>" class='btn-actions'><i class="fa fa-pencil"></i></a>
                            <a href="delete.php?page=patients&type=patient&id=<?= $rs['id'] ?>" class='btn-actions del' onclick='return deleteconfirm();'><i class="fa fa-trash"></i></a>
                        <?php }else{echo 'Aucune';} ?>
                    </div>
                </div>
                <?php 
                        $count++;
                     }
                 }else{
            ?>
                <center><div class="nothing">Aucun élément</div></center>
            <?php        
                 }
                ?>

            </div>

<?php }else if(!empty($_GET['page']) AND $_GET['page'] == 'chambres'){ ?>
<div class="entete">
    <span class="titredash">Chambres</span>
     <?php if($infos['poste'] != 'infirmiere'){ ?>
        <button onclick="self.location.href='newservice.php?page=chambres&type=chambre'" class="boxed-btn3 right"><i class="fa fa-plus"></i> Nouvelle chambre</button>
    <?php } ?>
</div>

<div class="table">
                <div class="tr black">
                    <div class="th black">Numéro</div>
                    <div class="th black">Numero de chambre</div>
                    <div class="th black">Type</div>
                    <div class="th black">Etat</div>
                    <div class="th black">Action</div>
                </div>
                <?php 
                    $count = 0;
                    $chambre = new Chambre();
                    $result = $chambre->show();
                    $cont = count($result);
                    if($cont > 0){
                    foreach($result as $rs){
                ?>
                <div class="tr hospi <?= (($count % 2) == 1)?' gray':' ' ?>">
                    <div class="td"><?= $count + 1 ?></div>
                    <div class="td"><?= $rs['numero'] ?></div>
                    <div class="td"><?= $rs['type'] ?></div>
                    <div class="td"><?php if($rs['etat'] == 'Libre'){ echo '<i class="fa fa-unlock"></i> '. $rs['etat'];}else{echo '<i class="fa fa-lock"></i> '. $rs['etat'];} ?></div>

                    <div class="td">
                        <?php if($infos['poste'] != 'infirmiere'){ ?>
                            <a href="modif.php?page=chambres&type=chambre&id=<?= $rs['id'] ?>" class='btn-actions'><i class="fa fa-pencil"></i></a>
                            <a href="delete.php?page=chambres&type=chambre&id=<?= $rs['id'] ?>" class='btn-actions del' onclick='return deleteconfirm();'><i class="fa fa-trash"></i></a>
                        <?php }else{
                            if($rs['etat'] == 'Libre'){
                        ?>
                            <a href="modifetat.php?page=occupe&id=<?= $rs['id'] ?>" class='btn-actions small'><i class="fa fa-pencil"></i> Modifier</a>

                        <?php  
                    }else{
                    ?>
                        <a href="modifetat.php?page=libre&id=<?= $rs['id'] ?>" class='btn-actions small'><i class="fa fa-pencil"></i> Modifier</a>
                    <?php
                        } 
                        }

                        ?>
                    
                    </div>
                </div>
                <?php 
                        $count++;
                     }
                 }else{
            ?>
                <center><div class="nothing">Aucun élément</div></center>
            <?php        
                 }
                ?>

            </div>
<?php }else if(!empty($_GET['page']) AND $_GET['page'] == 'hospi'){ ?>

<div class="entete">
    <span class="titredash">Hospitalisations</span>
    <button onclick="self.location.href='newservice.php?page=hospi&type=hospi'" class="boxed-btn3 right"><i class="fa fa-plus"></i> Nouvelle hospitalisation</button>
</div>

<div class="table">
                <div class="tr black">
                    <div class="th black">Numéro</div>
                    <div class="th black">Date d'entrée</div>
                    <div class="th black">Date de sortie</div>
                    <div class="th black">Traitement</div>
                    <div class="th black">Action</div>
                </div>
                <?php 
                    $count = 0;
                    $hospitalisation = new Hospitalisation();
                    $result = $hospitalisation->show();
                    $cont = count($result);
                    if($cont > 0){
                    foreach($result as $rs){
                ?>
                <div class="tr hospi <?= (($count % 2) == 1)?' gray':' ' ?>">
                    <div class="td"><?= $count + 1 ?></div>
                    <div class="td"><?= $rs['dateentree'] ?></div>
                    <div class="td"><?= $rs['datesortie'] ?></div>
                    <div class="td"><?= $rs['traitement'] ?></div>

                    <div class="td">
                        <a href="modif.php?page=hospi&type=hospi&id=<?= $rs['id'] ?>" class='btn-actions'><i class="fa fa-pencil"></i></a>
                        <a href="delete.php?page=hospi&type=hospi&id=<?= $rs['id'] ?>" class='btn-actions del' onclick='return deleteconfirm();'><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                <?php 
                        $count++;
                     }
                 }else{
            ?>
                <center><div class="nothing">Aucun élément</div></center>
            <?php        
                 }
                ?>

            </div>

<?php }else if(!empty($_GET['page']) AND $_GET['page'] == 'personnel'){ ?>


<div class="entete">
    <span class="titredash">Patients</span>
    <button onclick="self.location.href='newservice.php?page=personnel&type=personnel'" class="boxed-btn3 right"><i class="fa fa-plus"></i> Nouveau personnel</button>
</div>

<div class="table">
                <div class="tr black">
                    <div class="th black">Numéro</div>
                    <div class="th black">Nom et Prénom</div>
                    <div class="th black">Naissance</div>
                    <div class="th black">Adresse</div>
                    <div class="th black">Téléphone</div>
                    <div class="th black">Email</div>
                    <div class="th black">Mot de passe</div>
                    <div class="th black">Poste</div>
                    <div class="th black">Action</div>
                </div>
                <?php
                    $email = $_SESSION['user']; 
                    $count = 0;
                    $personnel = new Personnel();
                    $result = $personnel->show($email);
                    $cont = count($result);
                    if($cont > 0){
                    foreach($result as $rs){
                ?>
                <div class="tr personnel<?= (($count % 2) == 1)?' gray':' ' ?>">
                    <div class="td"><?= $count + 1 ?></div>
                    <div class="td"><?= $rs['nom'].' '.$rs['prenom'] ?></div>
                    <div class="td"><?= $rs['datenaissance'] ?></div>
                    <div class="td"><?= $rs['adresse'] ?></div>
                    <div class="td"><?= $rs['tel'] ?></div>
                    <div class="td"><?= $rs['email'] ?></div>
                    <div class="td"><?= $rs['password'] ?></div>
                    <div class="td"><?= $rs['poste'] ?></div>
                    <div class="td">
                        <a href="modif.php?page=personnel&type=personnel&id=<?= $rs['id'] ?>" class='btn-actions'><i class="fa fa-pencil"></i></a>
                        <a href="delete.php?page=personnel&type=personnel&id=<?= $rs['id'] ?>" class='btn-actions del' onclick='return deleteconfirm();'><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                <?php 
                        $count++;
                     }
                 }else{
            ?>
                <center><div class="nothing">Aucun élément</div></center>
            <?php        
                 }
                ?>

            </div>


<?php }else if(!empty($_GET['page']) AND $_GET['page'] == 'consultation'){ ?>


<div class="entete">
    <span class="titredash">Consultations</span>
    <button onclick="self.location.href='newservice.php?page=consultation&type=consultation'" class="boxed-btn3 right"><i class="fa fa-plus"></i> Nouvelle consultation</button>
</div>

<div class="table">
                <div class="tr black">
                    <div class="th black">Numéro</div>
                    <div class="th black">Nom et Prénom</div>
                    <div class="th black">date</div>
                    <div class="th black">Heure</div>
                    <div class="th black">Diagnostic</div>
                    <div class="th black">Traitement</div>
                    <div class="th black">Action</div>
                </div>
                <?php
                    $email = $_SESSION['user']; 
                    $count = 0;
                    $consultation = new Consultation();
                    $result = $consultation->show();
                    $cont = count($result);
                    if($cont > 0){
                    foreach($result as $rs){
                ?>
                <div class="tr patient<?= (($count % 2) == 1)?' gray':' ' ?>">
                    <div class="td"><?= $count + 1 ?></div>
                    <div class="td"><?= $rs['nom'].' '.$rs['prenom'] ?></div>
                    <div class="td"><?= $rs['dates'] ?></div>
                    <div class="td"><?= $rs['heure'] ?></div>
                    <div class="td"><?= $rs['diagnostic'] ?></div>
                    <div class="td"><?= $rs['traitement'] ?></div>
                    <div class="td">
                        <a href="modif.php?page=consultation&type=consultation&id=<?= $rs['idc'] ?>&idp=<?= $rs['idp'] ?>" class='btn-actions'><i class="fa fa-pencil"></i></a>
                        <a href="delete.php?page=consultation&type=consultation&id=<?= $rs['idc'] ?>&idp=<?= $rs['idp'] ?>" class='btn-actions del' onclick='return deleteconfirm();'><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                <?php 
                        $count++;
                     }
                 }else{
            ?>
                <center><div class="nothing">Aucun élément</div></center>
            <?php        
                 }
                ?>

            </div>


<?php } ?>

	</div>

    <script type="text/javascript">
        function deleteconfirm(){
            if(confirm("Êtes vous sur de vouloir supprimer cet élément ?") == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
	
</body>
</html>