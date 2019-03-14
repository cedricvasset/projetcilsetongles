<?php
//page servant uniquement de passerelle pour la deconnexion
session_start();
include '../controllers/disconnectSessionCtrl.php';
include '../models/dataBase.php';
include '../models/clientUser.php';
include('../header.php');
?>

<?php include('../footer.php'); ?>