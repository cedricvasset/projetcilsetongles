<?php
session_start();
include('../header.php');
include '../models/clientUser.php';
include '../controllers/clientInformationUpdateCtrl.php';

?>
<h3>Modifier mes informations</h3>
<div class="updateForm">
    <form action="clientInformationUpdate.php" method="POST">
        <div id="clientInformationUpdate" class="form-group">
            <div class="identity">
                <div class="row col-lg-12 justify-content-center">
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">NOM:</label>
                        <!--                            pour que le texte saisi reste en memoire donne à la value le contenu du $_POST['lastname'] -->
                        <input type="text" class="form-control" placeholder="Nom" id="lastname" name="lastname" value="<?= $_SESSION['lastname'] ?>">
                        <p><?= (empty($formError['lastname'])) ? '' : $formError['lastname'] ?></p>
                    </div>
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">PRENOM:</label>
                        <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname" value="<?= $_SESSION['firstname'] ?>">
                        <p><?= (empty($formError['firstname'])) ? '' : $formError['firstname'] ?></p>
                    </div>
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">DATE de Naissance:</label>
                        <input max="<?= date('Y-m-d') ?>" type="date" class="form-control"  id="birthdate" name="birthdate" value="<?= date('Y-m-d', strtotime($_SESSION['birthdate'])) ?>">
                        <p><?= (empty($formError['birthdate'])) ? '' : $formError['birthdate'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
                        <input type="mail" class="form-control" placeholder="Email" id="mail" name="mail" value="<?= $_SESSION['mail'] ?>">
                        <p><?= (empty($formError['mail'])) ? '' : $formError['mail'] ?></p>
                        <p><?= (empty($formError['existMail'])) ? '' : $formError['existMail'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="phone" class="col-sm-2 col-form-label">Téléphone:</label>
                        <input type="text" class="form-control" placeholder="Téléphone" id="phone" name="phone" value="<?= $_SESSION['phone'] ?>">
                        <p><?= (empty($formError['phone'])) ? '' : $formError['phone'] ?></p>
                    </div>
                    <button type="submit" name="submit" class="btnValid btn-primary btn-lg justify-content-center">VALIDER LES MODIFICATIONS</button>
                </div>
            </div>
        </div>
    </form>
</div>
<h3>Modifier mon mot de passe</h3>
<div class="updateForm">
    <form action="clientInformationUpdate.php" method="POST">
        <div id="clientInformationUpdatePassword" class="form-group">
            <div class="passwordUpdate">
                <div class="row col-lg-12 justify-content-center">
                    <div class="col-lg-6">
                        <label for="password" class="col-sm-6 col-form-label">Nouveau mot de passe : </label>
                        <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" value="<?= (isset($password)) ? $_POST['password'] : '' ?>">
                        <p><?= (empty($formError['password'])) ? '' : $formError['password'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="confirmPassword" class="col-sm-6 col-form-label">Confirmer votre mot de passe :</label>
                        <input type="password" class="form-control" placeholder="confirmer mot de passe" id="confirmPassword" name="confirmPassword" value="<?= (isset($confirmPassword)) ? $_POST['confirmPassword'] : '' ?>">
                        <p><?= (empty($formError['confirmPassword'])) ? '' : $formError['confirmPassword'] ?></p>
                    </div>
                    <button type="submit" name="submitPassword" class="btnValid btn-primary btn-lg justify-content-center">MODIFIER MON MOT DE PASSE</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include('../footer.php'); ?>
