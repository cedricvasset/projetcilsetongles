<?php

$prestation = new prestation();
$appointment = new appointment();
$message = '';
$prestationList = $prestation->getPrestationList();
$formError = array();
$success = false;
if (isset($_POST['submit']))
{
    if (!empty($_POST['appointmentDate']))
    {
//        htmlspecialchars pour modifier les characteres spéciaux avant l 'entrée en base de données
        $appointmentDate = htmlspecialchars($_POST['appointmentDate']);
    }
    else
    {
//        message d'erreur si le champ est vide
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
//        on compte le nombre d'erreur du tableau d'erreur et si il est = 0 alors on attribut les valeurs aux variables
        $appointment->id_a7b98_users = $_SESSION['id'];
        $appointment->id_a7b98_prestationsList = $_POST['prestation'];
        $appointment->date = $appointmentDate . ' ' . $hour;
//        on lance la méthode comptant le nombre de rendez vous correspondant à la date saisie
        $checkFreeAppointment = $appointment->checkFreeAppointment();
        if (intval($checkFreeAppointment->takenAppointment) === 1)
        {
//            si le resultat est 1 alors on genere une erreu dans le tableau d'erreur
            $formError['takenAppointments'] = 'echec Ce rendez-vous est déja attribué';
//            et on passe success à false
            $success = false;
            $message = 'echec Ce rendez-vous est déja attribué';
        }
        elseif (intval($checkFreeAppointment->takenAppointment) === 0)
        {
//            si le resultat est =0 on lance la méthode d'insertion du rdv dans la base de données
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

