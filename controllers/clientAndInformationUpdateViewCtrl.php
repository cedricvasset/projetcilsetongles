<?php
$clients = new users();
if(isset($_GET['id']))
{
    $clients->id = $_GET['id'];
    $clientInfo = $clients->clientInfo();
    $appointment = new appointment();
    $appointment->id_a7b98_users = $_GET['id'];
    $clientListAppointment = $appointment->clientListAppointment();
}

?>

