<?php
session_start();
include '../models/dataBase.php';
include '../models/clientUser.php';
include '../models/appointment.php';
include '../controllers/clientAndInformationUpdateViewCtrl.php';
include('../header.php');
include('administratorNavbar.php');
?>
<div class="card text-white bg-info mb-3 informationReturn" >
    <div class="card-header informationReturn"><?= $clients->lastname ?> <?= $clients->firstname ?></div>
    <div class="card-body informationReturn">
        <h4 class="card-title">Informations</h4>
        <p class="card-text">Date de naissance : <?= $clients->birthdate ?></p>
        <p class="card-text">Téléphone : <?= $clients->phone ?></p>
        <p class="card-text">Email : <?= $clients->mail ?></p>
        <?php
        foreach ($clientListAppointment as $list)
        {
//                création d'une ternaire (ternaire imbriquée) permettant de modifier la classe en fonction du status du rendez-vous.permet de modifier la couleur et le texte à l'affichage
            ?>
            <div class="col-lg-4 card text-white <?= $list->id_a7b98_statusAppointments == 3 ? 'bg-warning' : ($list->id_a7b98_statusAppointments == 1 ? 'bg-success' : 'bg-danger'); ?> mb-3" style="max-width: 20rem;">
                <div class="card-header"><?= $list->id_a7b98_statusAppointments == 3 ? 'En attente de validation' : ($list->id_a7b98_statusAppointments == 1 ? 'rendez-vous validé' : 'non validé'); ?></div>
                <div class="card-body">
                    <h4 class="card-title"><?= $list->date ?></h4>
                </div>
            </div>
        <?php } ?>
        <a class="btn btn-success" href="disconnectSession.php?action=disconnect">Créer un rendez-vous</a>
        <a class="btn btn-primary" href="clientInformationUpdateByAdmin.php?id=<?= $clients->id ?>"> Modifier les Informations</a>
        <a class="btn btn-danger" href="eraseUserByAdmin.php?id=<?= $clients->id ?>">SUPPRIMER CE COMPTE</a>
    </div>
</div>
<?php
include('../footer.php');
?>