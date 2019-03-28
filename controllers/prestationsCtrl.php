<?php
$prestation = new prestation();
$prestation->ID_a7b98_prestationsTypes = $_GET['id'];
$prestationList = $prestation->getPrestationListByType();
?>

