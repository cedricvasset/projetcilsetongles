<?php
session_start();
include'../header.php';
include '../models/clientUser.php';
include '../controllers/eraseUserCtrl.php';
?>
<div class="alert alert-dismissible alert-danger">
    <strong>!!! ATTENTION Vous êtes sur le point de SUPPRIMER votre compte définitivement !!!</strong> 
    <div class="row col-lg-12 justify-content-center">
        <a href="alreadyRegister.php" class="alert-link alertButtonErasing btn btn-primary">J'ai réfléchis ou je me suis trompé , je retourne en arrière</a>  
    </div>
</div>
<div class="updateForm">
    <form action="eraseUser.php" method="POST">
        <div id="clientInformationUpdatePassword" class="form-group">
            <div class="passwordUpdate">
                <div class="row col-lg-12 justify-content-center">
                    <h2>Afin de supprimer votre compte , merci de renseigner votre mot de passe.</h2>
                    <div class="col-lg-6">
                        <label for="password" class="col-sm-6 col-form-label">Mon mot de passe : </label>
                        <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" value="<?= (isset($password)) ? $_POST['password'] : '' ?>">
                        <p><?= (empty($formError['password'])) ? '' : $formError['password'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="confirmPassword" class="col-sm-6 col-form-label">Confirmer votre mot de passe :</label>
                        <input type="password" class="form-control" placeholder="confirmer mot de passe" id="confirmPassword" name="confirmPassword" value="<?= (isset($confirmPassword)) ? $_POST['confirmPassword'] : '' ?>">
                        <p><?= (empty($formError['confirmPassword'])) ? '' : $formError['confirmPassword'] ?></p>
                    </div>
                    <button type="submit" name="submitEraseUser" class="btnValid btn-danger btn-lg justify-content-center">JE SUPPRIME MON COMPTE</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include '../footer.php'; ?>
