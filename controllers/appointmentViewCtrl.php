<?php

$prestation = new prestation();
$prestationList = $prestation->getPrestationList();
$formError = array();
$success = false;

if (isset($_POST['submit']))
{
    if (!empty($_POST['appointmentDate']))
    {
        $appointmentDate = htmlspecialchars($_POST['appointmentDate']);
    }
    else
    {
        $formError['appointmentDate'] = 'Merci de choisir une date';
    }
    if (!empty($_POST['hour']))
    {
        $hour = htmlspecialchars($_POST['hour']);
    }
    else
    {
        $formError['hour'] = 'Veuillez entrer l\'heure';
    }
    if (count($formError) == 0)
    {
        
        $idClient = $_SESSION['id'];
        $idPrestation = $prestation->id;
        $appointment = new appointment();
        $date = $appointmentDate . ' ' . $hour;
        $success = true;
        $inputRequestAppointment = $appointment->inputRequestAppointment();
     
    }
}
?>

