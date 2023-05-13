<?php 
if(!empty($_GET['id'])){
    $id = $_GET['id'];
}
require_once('../model/Chambre.php');
$chambre = new Chambre();

if($_GET['page'] == 'libre'){
$etat = 'Libre';
$chambre->modifEtat($etat, $id);

}else{
$etat = 'Occupé';
$chambre->modifEtat($etat, $id);
}

header("location:dashboard.php?page=chambres");
?>