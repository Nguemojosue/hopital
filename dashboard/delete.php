<?php 
if(!empty($_GET['id'])){
    $id = $_GET['id'];
}

if(!empty($_GET['type']) AND $_GET['type'] == 'patient'){
	require_once('../model/Patient.php');

	$patient = new Patient();
	$patient->delete($id);
?>
	<script type="text/javascript">self.location.href="dashboard.php?page=patients";</script>
<?php
}else if(!empty($_GET['type']) AND $_GET['type'] == 'chambre'){
	require_once('../model/Chambre.php');

	$chambre = new Chambre();
	$chambre->delete($id);
?>
	<script type="text/javascript">self.location.href="dashboard.php?page=chambres";</script>
<?php
}else if(!empty($_GET['type']) AND $_GET['type'] == 'hospi'){
	require_once('../model/Hospitalisation.php');

	$hospitalisation = new Hospitalisation();
	$hospitalisation->delete($id);
?>
	<script type="text/javascript">self.location.href="dashboard.php?page=hospi";</script>
<?php
}else if(!empty($_GET['type']) AND $_GET['type'] == 'personnel'){
	require_once('../model/Personnel.php');

	$personnel = new Personnel();
	$personnel->delete($id);
?>
	<script type="text/javascript">self.location.href="dashboard.php?page=personnel";</script>
<?php
}else if(!empty($_GET['type']) AND $_GET['type'] == 'consultation'){
	require_once('../model/Consultation.php');

	$consultation = new Consultation();
	$consultation->delete($id);
?>
	<script type="text/javascript">self.location.href="dashboard.php?page=consultation";</script>
<?php
}
?>