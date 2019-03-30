<?php
$prestation = new prestation();
$prestation->ID_a7b98_prestationsTypes = $_GET['id'];
//lancement de la méthode récupérant les prestations en fonction de leur type
$prestationList = $prestation->getPrestationListByType();
?>

