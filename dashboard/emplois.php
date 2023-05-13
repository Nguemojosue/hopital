<?php 
session_start();
require('../model/Service.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stagio | Emplois</title>

	<link rel="stylesheet" href="../css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/style_dash.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
  <?php include('component/header.php'); ?>
  <?php include('component/navigation.php'); ?>


	<div class="content">
		<div class="entete">
			<span class="titredash">Emplois</span>
			<button onclick="self.location.href='newservice.php?page=emplois&type=jobs'" class="boxed-btn3 right"><i class="fa fa-plus"></i> Nouvel emploi</button>
		</div>
         <?php
            $typeservice = "jobs";
            $service = new Service();
            $result = $service->show($typeservice);

            foreach($result as $rs){
        ?>
		 <div class="row">
		 <div class="col-lg-12 col-md-12">
            <div class="single_jobs white-bg d-flex justify-content-between">
                <div class="jobs_left d-flex align-items-center">
                    <div class="thumb">
                       <center> <img src="<?= $rs['logo'] ?>" alt=""></center>
                    </div>
                    <div class="jobs_conetent">
                        <a href="job_details.html" class="titleItem"><h3><?= $rs['titre'] ?></h3></a>
                        <div class="links_locat d-flex align-items-center">
                            <div class="location">
                                <p> <i class="fa fa-map-marker"></i> &nbsp; <?= $rs['localisation'] ?></p>
                            </div>
                            <?php 
                                if($rs['type'] == 'CDI'){

                            ?>
                            <div class="location">
                                <p> <i class="fa fa-list-alt"></i> &nbsp; <?= $rs['type'] ?></p>
                            </div>
                            <div class="location">
                                <p> <i class="fa fa-money"></i> &nbsp; <?= $rs['prix'] ?> XFA (mois)</p>
                            </div>
                            <?php 
                                }else{
                            ?>
                            <div class="location">
                                <p> <i class="fa fa-list-alt"></i> &nbsp; <?= $rs['type'] ?></p>
                            </div>
                            <div class="location">
                                <p> <i class="fa fa-clock-o"></i> &nbsp; <?= $rs['duree'] ?> mois</p>
                            </div>
                             <div class="location">
                                <p> <i class="fa fa-money"></i> &nbsp; <?= $rs['prix'] ?> XFA (mois)</p>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="jobs_right">
                    <div class="apply_now">
                        <button href="job_details.html" class="boxed-btn3 view"><i class="fa fa-eye"></i></button>
                        <button href="job_details.html" class="boxed-btn3 del"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="date">
                        <i><p><?= $rs['dates'] ?></p></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php 
        }
    ?>
	</div>
	
</body>
</html>