<?php
$prestation = new prestation();
$appointment = new appointment();
$message = '';
$prestationList = $prestation->getPrestationList();
$formError = array();
$success = false;
if (isset($_GET['id']))
{
//    si il y a un id dans le get on attribut sa valeur 
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
//        si il n y a pas d'erreur
        $appointment->id_a7b98_statusAppointments = 4;
        $appointment->id = $_GET['id'];
        $appointment->id_a7b98_prestationsList = $_POST['prestation'];
        $appointment->date = $appointmentDate . ' ' . $hour;
//        on lance la méthode de vérification de l'existence d'un rendez-vous ou non
        $checkFreeAppointment = $appointment->checkFreeAppointment();

        if (intval($checkFreeAppointment->takenAppointment) === 1)
        {
//            si il y a 1 rdv
            $formError['takenAppointments'] = 'echec Ce rendez-vous est déja attribué';
            $success = false;
            $message = 'echec Ce rendez-vous est déja attribué';
        }
        elseif (intval($checkFreeAppointment->takenAppointment) === 0)
        {
//            si il n'y a pas de rdv on lance la méthode de mise a jour du rdv'
            $success = true;
            $inputRequestAppointment = $appointment->updateAppointmentDAte();
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

