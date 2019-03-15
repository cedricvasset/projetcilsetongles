<?php
session_start();
include '../models/dataBase.php';
include '../models/clientUser.php';
include '../controllers/alreadyRegisterCtrl.php';
include('../header.php');
?>
<?php
if (isset($_SESSION['isConnect']))
{
    ?>
    <div class="card text-white bg-info mb-3 informationReturn" >
        <div class="card-header informationReturn"><?= $_SESSION['lastname'] ?> <?= $_SESSION['firstname'] ?></div>
        <div class="card-body informationReturn">
            <h4 class="card-title">Informations</h4>
            <p class="card-text">Date de naissance : <?= $_SESSION['birthdate'] ?></p>
            <p class="card-text">Téléphone : <?= $_SESSION['phone'] ?></p>
            <p class="card-text">Email : <?= $_SESSION['mail'] ?></p>
            <a class="btn btn-primary" href="disconnectSession.php?action=disconnect">Deconnexion</a>
            <a class="btn btn-primary" href="clientInformationUpdate.php"> Modifier ces Informations</a>
            <a class="btn btn-danger" href="eraseUser.php">SUPPRIMER MON COMPTE</a>
        </div>
    </div>
    <?php
}
else
{
    ?>
    <form action="alreadyRegister.php?action=disconnect" method="POST">
        <div id="siteIdentity" class="row col-lg-12 justify-content-center">
            <div class="col-lg-5">
                <label for="userName">identifiant :</label>
                <input class="form-control" type="mail" id="userName" name="userName" placeholder="Email de contact" value="<?= (!empty($mail)) ? $_POST['userName'] : '' ?>">
            </div>  
            <div class="col-lg-5">
                <label for="password">mot de passe :</label>
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

<?php include('../footer.php'); ?>