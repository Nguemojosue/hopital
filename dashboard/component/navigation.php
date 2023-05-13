	<?php
		if(empty($_GET['page'])){
			 header('location:dashboard.php?page=dash');
		}
	?>
	<div class="navigation">
		<div class="logo_dash">
			Hospital 
		</div>
		<a href="dashboard.php?page=dash" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'dash'){echo 'active';} ?>"><i class="fa fa-dashboard"></i> &nbsp;Tableau de bord</a>
		<?php if($infos['poste'] == 'admin'){ ?>
		

		<a href="dashboard.php?page=patients" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'patients'){echo 'active';} ?>"><i class="fa fa-wheelchair"></i> &nbsp;Patients</a>

		<a href="dashboard.php?page=chambres" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'chambres'){echo 'active';} ?>"><i class="fa fa-bed"></i> &nbsp;Chambres</a>

		<a href="dashboard.php?page=hospi" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'hospi'){echo 'active';} ?>"><i class="fa fa-ambulance"></i> &nbsp;Hospitalisation</a>

		<a href="dashboard.php?page=personnel" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'personnel'){echo 'active';} ?>"><i class="fa fa-users"></i> &nbsp;Personnel</a>

		<a href="dashboard.php?page=consultation" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'consultation'){echo 'active';} ?>"><i class="fa fa-list-alt"></i> &nbsp;Consultations</a>

		<?php 
			}else if($infos['poste'] == 'medecin'){
		?>
		<a href="dashboard.php?page=hospi" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'hospi'){echo 'active';} ?>"><i class="fa fa-book"></i> &nbsp;Hospitalisation</a>

		<a href="dashboard.php?page=consultation" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'consultation'){echo 'active';} ?>"><i class="fa fa-list-alt"></i> &nbsp;Consultations</a>
		<?php 

			}else{
		?>
		<a href="dashboard.php?page=patients" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'patients'){echo 'active';} ?>"><i class="fa fa-users"></i> &nbsp;Patients</a>

		<a href="dashboard.php?page=chambres" class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'chambres'){echo 'active';} ?>"><i class="fa fa-briefcase"></i> &nbsp;Chambres</a>
		<?php		
			}
		?>

		<!-- <a class="link_dash <?php if(!empty($_GET['page']) AND $_GET['page'] == 'compte'){echo 'active';} ?>"><i class="fa fa-user-circle"></i> &nbsp;Compte</a> -->
		<a href="deconnexion.php" class="link_dash"><i class="fa fa-power-off"></i> &nbsp;Déconnexion</a>
	</div>