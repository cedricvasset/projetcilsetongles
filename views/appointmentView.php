<?php
session_start();
include '../models/dataBase.php';
include '../models/clientUser.php';
include '../models/appointment.php';
include '../models/prestation.php';
include '../controllers/appointmentViewCtrl.php';
include('../header.php');
?>

<?php

if (isset($_SESSION['isConnect']))
{ if ($success == true){ ?>
<div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
  <div class="card-header"><?= $message ?></div>
  <div class="card-body">
      <h4 class="card-title"><?= $_SESSION['lastname'] ?> <?= $_SESSION['firstname'] ?></h4>
    <p class="card-text"><?= $appointmentDate ?></p>
    <p class="card-text"><?= $hour ?></p>
    <p class="card-text">Votre rendez-vous est en attente de Validation</p>
  </div>
</div>
<?php } else{
    ?>
    <form action="appointmentView.php" method="POST">
        <div id="siteRegistration" class="form-group">
            <div class="row appointmentForm">
                    <div class="col-lg-5 form-group">
                        <label for="exampleSelect1">CHOISISSEZ VOTRE PRESTATION : </label>
                        <select name="prestation" class="backgroundSelect form-control" id="exampleSelect1">
                            <?php
                            foreach ($prestationList as $list)
                            {
                                ?>
                            <option value="<?= $list->id ?>"><?= $list->prestation ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                <div class="col-lg-3">
                    <label class="col-form-label" for="inputDefault">DATE SOUHAITEE : </label>
                    <input min="<?= date('Y-m-d') ?>" type="date" class="backgroundSelect form-control"  id="appointmentDate" name="appointmentDate" value="<?= (isset($appointmentDate)) ? $_POST['appointmentDate'] : '' ?>">
                    <p><?= (empty($formError['takenAppointments'])) ? '' : $formError['takenAppointments'] ?></p>
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
}
}
else
{
    ?>
    <div id="appointmentRegistrationLink" class="form-group">
        <p>Pour prendre rendez-vous, vous devez préalablement être <a href="/views/newRegistration.php">inscrit</a> et <a href="/views/alreadyRegister.php">identifié</a> sur le site</p>
    </div>
<?php } ?>


<?php include('../footer.php'); ?>