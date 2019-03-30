<?php
$appointment = new appointment();
if (isset($_GET['valid']))
{
//    on vérifi dans les parametres d'url la presence de valid
    $appointment->id = $_GET['id'];
//  on lance la méthode
    $appointmentValidateByAdmin = $appointment->appointmentValidateByAdmin();
}
if (isset($_GET['notvalid']))
{
//    on vérifi dans les parametres d'url la presence de notvalid
    $appointment->id = $_GET['id'];
//  on lance la méthode
    $appointmentValidateByAdmin = $appointment->changeStatusAppointmentByAdmin();
}
//on lance la méthode needvalidate 
$needValidateAppointments = $appointment->needValidateAppointments();
?>

