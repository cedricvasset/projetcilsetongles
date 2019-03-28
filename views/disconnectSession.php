<?php
//page servant uniquement de passerelle pour la deconnexion
session_start();

include('../header.php');
include '../controllers/disconnectSessionCtrl.php';
include '../models/clientUser.php';

?>

<?php include('../footer.php'); ?>