<?php
session_start();
include '../header.php';
include '../models/clientUser.php';
include '../models/appointment.php';
include '../controllers/newAppointmentViewCtrl.php';
include 'administratorNavbar.php';
?>
<div class="newAppointment">
    <p>mes rendez-vous à valider :</p>
</div>
<div class="row">
    <?php
    foreach ($needValidateAppointments as $list)
    {
        ?>
        <div class="col-lg-4 card text-white bg-warning mb-3" style="max-width: 20rem;">
            <div class="card-header">rendez-vous en attente de validation</div>
            <div class="card-body">
                <h4 class="card-title"><?= $list->firstname ?> <?= $list->lastname ?></h4>
                <p><?= $list->prestation ?></p>
                <p><?= $list->date ?></p>
                <a href="/views/newAppointmentView.php?valid=valid&id=<?= $list->id ?>"><img class="img-fluid" src="../assets/img/check-ok.png" title="valider" /></a>
                <a href="/views/suggestAppointmentByAdmin.php?update=update&id=<?= $list->id ?>"><img class="img-fluid" src="../assets/img/circle-bluerdv2.png" title="valider" /></a>
                <a href="/views/newAppointmentView.php?notvalid=notvalid&id=<?= $list->id ?>"><img class="img-fluid" src="../assets/img/non-valide.png" title="refuser" /></a>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include '../footer.php';
?>