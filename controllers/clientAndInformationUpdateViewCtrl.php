<?php

$clients = new users();
if (isset($_GET['id']))
{
//    si il y a un id dans les parametres d'url
    $clients->id = $_GET['id'];
//    on attribu les valeurs aux variables et on lance la méthode
    $clientInfo = $clients->clientInfo();
//    on lance une nouvelle instance de la class appointment
    $appointment = new appointment();
//    on attribu les valeurs aux variables et on lance la méthode 
    $appointment->id_a7b98_users = $_GET['id'];
    $clientListAppointment = $appointment->clientListAppointment();
}
?>

