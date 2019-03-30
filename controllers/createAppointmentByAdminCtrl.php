<?php

$prestation = new prestation();
$appointment = new appointment();
$message = '';
//utilisation de la méthode qui récupère la liste des prestations
$prestationList = $prestation->getPrestationList();
//initialisation d'un tableau d'erreur
$formError = array();
$success = false;
if (isset($_GET['id']))
{
//    on attribu la valeur de l'id passé en parametre d'url à la clé étrangère de la table appointment
    $appointment->id_a7b98_users = $_GET['id'];
}
if (isset($_POST['submit']))
{
    if (!empty($_POST['appointmentDate']))
    {
//        verification des post date et hour
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
//        si il n'y a pas d'erreur dans le tableau d'erreur
//        attribution des valeurs aux variables
        $appointment->id_a7b98_statusAppointments = 1; // 1 car l'administrateur valide directement le rdv
        $appointment->id_a7b98_users = $_GET['id'];
        $appointment->id_a7b98_prestationsList = $_POST['prestation'];
        $appointment->date = $appointmentDate . ' ' . $hour;
//        lancement de la méthode de vérification de l'existence ou non d'un rdv à cette date
        $checkFreeAppointment = $appointment->checkFreeAppointment();

        if (intval($checkFreeAppointment->takenAppointment) === 1)
        {
//            si la méthode renvoi 1 il existe un rdv donc on rempli le tableau d'erreur
            $formError['takenAppointments'] = 'echec Ce rendez-vous est déja attribué';
            $success = false;
            $message = 'echec Ce rendez-vous est déja attribué';
        }
        elseif (intval($checkFreeAppointment->takenAppointment) === 0)
        {
//            si la méthode renvoi 0 on lance la méthode
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

