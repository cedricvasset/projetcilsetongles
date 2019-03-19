<?php
session_start();
include '../models/dataBase.php';
include '../models/clientUser.php';
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
            <a class="btn btn-success" href="disconnectSession.php?action=disconnect">Créer un rendez-vous</a>
            <a class="btn btn-primary" href="clientInformationUpdateByAdmin.php?id=<?= $clients->id ?>"> Modifier les Informations</a>
            <a class="btn btn-danger" href="eraseUserByAdmin.php?id=<?= $clients->id ?>">SUPPRIMER CE COMPTE</a>
        </div>
    </div>
<?php
include('../footer.php');
?>