<?php
$appointment = new appointment();
$needValidateAppointments = $appointment->needValidateAppointments();
if(isset($_GET['valid'])){
  $appointment->id = $_GET['id'];
 $appointmentValidateByAdmin = $appointment->appointmentValidateByAdmin();
}
if(isset($_GET['notvalid'])){
  $appointment->id = $_GET['id'];
 $appointmentValidateByAdmin = $appointment->eraseAppointmentByAdmin();
}
?>

