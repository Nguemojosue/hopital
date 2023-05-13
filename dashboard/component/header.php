	<div class="header">
		<div class="profil-box">
			<div class="name">
				<?php 
					require_once('../model/Me.php');
					$me = new Me();
					$email = $_SESSION['user'];
					$infos = $me->infos($email);

					if($infos['poste'] == 'medecin'){
						echo 'Dr. '.$infos['nom'].' '.$infos['prenom'];
					}else{
						echo $infos['nom'].' '.$infos['prenom'];
					}
				?>
				
				<div class="statut"><?php if($infos['poste'] == 'admin'){echo 'Administrateur';}else if($infos['poste'] == 'medecin'){echo 'Medecin';}else{echo 'Infirmier(e)';} ?></div>
				<?php 

				?>
			</div>
			<div class="profil-circle"><i class="fa fa-user"></i></div>
		</div>
		<div class="searchBox"><input type="text" name="search" id="search" placeholder="Rechercher..." class="searchForm"><button class="btn btn-search"><i class="fa fa-search"></i></button></div>
	</div>