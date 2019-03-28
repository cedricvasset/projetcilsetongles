<?php
session_start();
include('../header.php');
include '../models/clientUser.php';
include '../controllers/memberInformationCtrl.php';
?>
<form action="memberInformation.php" method="POST">
        <div id="memberInformationUpdate" class="form-group">
            <div class="identity">
                <div class="row col-lg-12 justify-content-center">
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">NOM:</label>
                        <!--                            pour que le texte saisi reste en memoire donne à la value le contenu du $_POST['lastname'] -->
                        <input type="text" class="form-control" placeholder="Nom" id="lastname" name="lastname" value="<?= (isset($lastname)) ? $_POST['lastname'] : '' ?>">
                        <p><?= (empty($formError['lastname'])) ? '' : $formError['lastname'] ?></p>
                    </div>
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">PRENOM:</label>
                        <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname" value="<?= (isset($firstname)) ? $_POST['firstname'] : '' ?>">
                        <p><?= (empty($formError['firstname'])) ? '' : $formError['firstname'] ?></p>
                    </div>
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">DATE de Naissance:</label>
                        <input max="<?= date('Y-m-d') ?>" type="date" class="form-control"  id="birthdate" name="birthdate" value="<?= (isset($birthdate)) ? $_POST['birthdate'] : '' ?>">
                        <p><?= (empty($formError['birthdate'])) ? '' : $formError['birthdate'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
                        <input type="mail" class="form-control" placeholder="Email" id="mail" name="mail" value="<?= (isset($mail)) ? $_POST['mail'] : '' ?>">
                        <p><?= (empty($formError['mail'])) ? '' : $formError['mail'] ?></p>
                        <p><?= (empty($formError['existMail'])) ? '' : $formError['existMail'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="phone" class="col-sm-2 col-form-label">Téléphone:</label>
                        <input type="text" class="form-control" placeholder="Téléphone" id="phone" name="phone" value="<?= (isset($phone)) ? $_POST['phone'] : '' ?>">
                        <p><?= (empty($formError['phone'])) ? '' : $formError['phone'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="password" class="col-sm-6 col-form-label">Mot de passe : </label>
                        <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" value="<?= (isset($password)) ? $_POST['password'] : '' ?>">
                        <p><?= (empty($formError['password'])) ? '' : $formError['password'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="confirmPassword" class="col-sm-6 col-form-label">Confirmer votre mot de passe :</label>
                        <input type="password" class="form-control" placeholder="confirmer mot de passe" id="confirmPassword" name="confirmPassword" value="<?= (isset($confirmPassword)) ? $_POST['confirmPassword'] : '' ?>">
                        <p><?= (empty($formError['confirmPassword'])) ? '' : $formError['confirmPassword'] ?></p>
                    </div>
                    <button type="submit" name="submit" class="btnValid btn-primary btn-lg justify-content-center">modifier mes informations</button>
                </div>
            </div>
        </div>
    </form>
<?php
include('../footer.php');
?>