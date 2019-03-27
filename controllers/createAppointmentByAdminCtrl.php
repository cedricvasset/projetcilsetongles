<?php

$prestation = new prestation();
$appointment = new appointment();
$message = '';
$prestationList = $prestation->getPrestationList();
$formError = array();
$success = false;
if (isset($_GET['id']))
{
    $appointment->id_a7b98_users = $_GET['id'];
}
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
        $appointment->id_a7b98_statusAppointments = 1;
        $appointment->id_a7b98_users = $_GET['id'];
        $appointment->id_a7b98_prestationsList = $_POST['prestation'];
        $appointment->date = $appointmentDate . ' ' . $hour;
        $checkFreeAppointment = $appointment->checkFreeAppointment();

        if (intval($checkFreeAppointment->takenAppointment) === 1)
        {
            $formError['takenAppointments'] = 'echec Ce rendez-vous est déja attribué';
            $success = false;
            $message = 'echec Ce rendez-vous est déja attribué';
        }
        elseif (intval($checkFreeAppointment->takenAppointment) === 0)
        {
            $success = true;
            $inputRequestAppointment = $appointment->inputRequestAppointment();
            $message = 'Votre demande est bien enregistrée';
        }
        else
        {
            $formError['takenAppointments'] = 'Merci de contacter le service technique!';
            $success = false;
            $message = 'echec Merci de contacter le service technique!';
        }
    }
}
?>

