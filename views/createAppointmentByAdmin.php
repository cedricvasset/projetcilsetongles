<?php
session_start();
include '../header.php';
include '../models/clientUser.php';
include '../models/appointment.php';
include '../models/prestation.php';
include '../controllers/createAppointmentByAdminCtrl.php';
include 'administratorNavbar.php';
?>
<form action="createAppointmentByAdmin.php?id=<?= $appointment->id_a7b98_users ?>" method="POST">
    <div id="siteRegistration" class="form-group">
        <div class="row appointmentForm">
            <div class="col-lg-5 form-group">
                <label for="exampleSelect1">CHOISISSEZ VOTRE PRESTATION : </label>
                <select name="prestation" class="backgroundSelect form-control" id="exampleSelect1">
                    <?php
                    foreach ($prestationList as $list)
                    { //boucle pour affichage de données dans la liste déroulante
                        ?>
                        <option value="<?= $list->id ?>"><?= $list->prestation ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-3">
                <label class="col-form-label" for="inputDefault">DATE SOUHAITEE : </label>
                <input min="<?= date('Y-m-d') ?>" type="date" class="backgroundSelect form-control"  id="appointmentDate" name="appointmentDate" value="<?= (isset($appointmentDate)) ? $_POST['appointmentDate'] : '' ?>">
                <p><?= (empty($formError['takenAppointments'])) ? '' : $formError['takenAppointments'] ?></p>
                <p><?= (empty($formError['appointmentDate'])) ? '' : $formError['appointmentDate'] ?></p>
            </div>
            <div class="col-lg-3">
                <label class="col-form-label" for="exampleSelect1">HORAIRE SOUHAITEE :</label>
                <select class="backgroundSelect form-control" name="hour" id="hour">
                    <option>08:30</option>
                    <option>10:30</option>
                    <option>13:00</option>
                    <option>15:00</option>
                    <option>17:00</option>
                </select>
            </div>
        </div>
        <button type="submit" name="submit" class="btnValid btn-primary btn-lg justify-content-center">VALIDER CETTE DEMANDE DE RENDEZ-VOUS</button> 
    </div>
</form>
<?php
include '../footer.php';
?>
