<?php
$appointment = new appointment();
if(isset($_GET['valid'])){
  $appointment->id = $_GET['id'];
 $appointmentValidateByAdmin = $appointment->appointmentValidateByAdmin();
}
if(isset($_GET['notvalid'])){
  $appointment->id = $_GET['id'];
 $appointmentValidateByAdmin = $appointment->changeStatusAppointmentByAdmin();
}
//if(isset($_GET['update']) && ($_POST['submit'])){
//  $appointment->id = $_GET['id'];
//  $prestation = new prestation();
//$appointment = new appointment();
//$formError = array();
//$success = false;
//    if (!empty($_POST['appointmentDate']))
//    {
//        $appointmentDate = htmlspecialchars($_POST['appointmentDate']);
//    }
//    else
//    {
//        $formError['appointmentDate'] = 'Merci de choisir une date';
//    }
//    if (!empty($_POST['hour']))
//    {
//        $hour = htmlspecialchars($_POST['hour']);
//    }
//    else
//    {
//        $formError['hour'] = 'Veuillez entrer l\'heure';
//    }
//    if (count($formError) == 0)
//    {
//        $appointment->id_a7b98_statusAppointments = 4;
//        $appointment->id_a7b98_users = $_GET['id'];
//        $appointment->id_a7b98_prestationsList = $_POST['prestation'];
//        $appointment->date = $appointmentDate . ' ' . $hour;
//        $checkFreeAppointment = $appointment->checkFreeAppointment();
//
//        if (intval($checkFreeAppointment->takenAppointment) === 1)
//        {
//            $formError['takenAppointments'] = 'echec Ce rendez-vous est déja attribué';
//            $success = false;
//            $message = 'echec Ce rendez-vous est déja attribué';
//        }
//        elseif (intval($checkFreeAppointment->takenAppointment) === 0)
//        {
//            $success = true;
//            $inputRequestAppointment = $appointment->updateAppointmentDAte();
//            $message = 'Votre demande est bien enregistrée';
//        }
//        else
//        {
//            $formError['takenAppointments'] = 'Merci de contacter le service technique!';
//            $success = false;
//            $message = 'echec Merci de contacter le service technique!';
//        }
//    }
//
//}
$needValidateAppointments = $appointment->needValidateAppointments();
?>

