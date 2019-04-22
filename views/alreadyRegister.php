<?php
session_start();
include '../header.php';
include '../models/clientUser.php';
include '../models/appointment.php';
include '../controllers/alreadyRegisterCtrl.php';
?>
<?php
//on verifi si une session est ouverte, dans ce cas on affiche la card.
if (isset($_SESSION['isConnect']) && ($_SESSION['id_a7b98_roles'] !=3))
{
    ?>
    <div class="card text-white bg-info mb-3 informationReturn" >
        <div class="card-header informationReturn"><?= $_SESSION['lastname'] ?> <?= $_SESSION['firstname'] ?></div>
        <div class="card-body informationReturn">
            <h4 class="card-title">INFORMATIONS</h4>
            <p class="card-text">DATE DE NAISSANCE : <?= $_SESSION['birthdate'] ?></p>
            <p class="card-text">TELEPHONE : <?= $_SESSION['phone'] ?></p>
            <p class="card-text">EMAIL : <?= $_SESSION['mail'] ?></p>
            <p class="card-text">MES RENDEZ-VOUS :</p>
            <div class="row">
                <?php
                foreach ($clientListAppointment as $list)
                {
//                création de ternaires permettant de modifier la classe en fonction du status du rendez-vous.permet de modifier la couleur et le texte à l'affichage
                    ?>
                    <div class="col-lg-4 card text-white <?= $list->id_a7b98_statusAppointments == 3 ? 'bg-warning' : ($list->id_a7b98_statusAppointments == 1 ? 'bg-success' : ($list->id_a7b98_statusAppointments == 2 ? 'bg-danger' : 'bg-info')); ?> mb-3" style="max-width: 20rem;">
                        <div class="card-header"><?= $list->id_a7b98_statusAppointments == 3 ? 'rendez-vous en attente de validation' : ($list->id_a7b98_statusAppointments == 1 ? 'votre rendez-vous a été validé' : ($list->id_a7b98_statusAppointments == 2 ? 'votre rendez-vous n\'est pas validé' : 'Nouvelle proposition de rendez-vous')); ?></div> 
                        <div class="card-body">
                            <p><?= $list->prestation ?></p>
                            <h4 class="card-title"><?= $list->date ?></h4>
                            <?php
                            if ($list->id_a7b98_statusAppointments == 4)
                            {
                                ?> 
                                <div>
                                    <a class="btn btn-primary" href="alreadyRegister.php?valid=valid&id=<?= $list->id ?>">ACCEPTER</a>
                                    <a class="btn btn-danger" href="alreadyRegister.php?notValid=notValid&id=<?= $list->id ?>">REFUSER</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="btn btn-primary" href="disconnectSession.php?action=disconnect">Deconnexion</a>
            <a class="btn btn-primary" href="clientInformationUpdate.php"> Modifier ces Informations</a>
            <a class="btn btn-danger" href="eraseUser.php">SUPPRIMER MON COMPTE</a>
        </div>
    </div>
    <?php
}
else
{
    //si il n'y a pas de session ouverte alors on affiche le formulaire d'identification 
    ?>
    <form action="alreadyRegister.php" method="POST">
        <div class="title">
            <p>Veuillez vous identifier</p>
        </div>
        <div id="siteIdentity" class="row col-lg-12 justify-content-center">
            <div class="col-lg-5">
                <label for="userName">IDENTIFIANT :</label>
                <input class="form-control" type="mail" id="userName" name="userName" placeholder="Email de contact" value="<?= (!empty($mail)) ? $_POST['userName'] : '' ?>">
            </div>  
            <div class="col-lg-5">
                <label for="password">MOT DE PASSE :</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe" value="<?= (!empty($password)) ? $_POST['password'] : '' ?>">
            </div>
            <div class="col-5 align-self-center justify-content-center">
                <button type="submit" name="identSubmit" class="btn btn-primary">VALIDER</button>
            </div>
            <p><?= empty($formError['error']) ? '' : $formError['error'] ?></p>
            <p><?= empty($formError['checkIfMailExist']) ? '' : $formError['checkIfMailExist'] ?></p>
        </div>
    </form>
<?php } ?>
<?php include '../footer.php'; ?>