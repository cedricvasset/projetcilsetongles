<?php
session_start();
include '../header.php';
include '../models/clientUser.php';
include '../controllers/newRegistrationCtrl.php';
if ($success == true)
{ //si la variable success est true, on affiche les données
    ?>
    <div class="informationReturn">
        <h2>Récapitulatif des informations que vous nous avez envoyées</h2>
        <p>PRÉNOM : <?= $lastname ?></p>
        <p>NOM : <?= $firstname ?></p>
        <p>DATE DE NAISSANCE : <?= $birthdate ?> </p>
        <p>TELEPHONE : <?= $phone ?> </p>
        <p>EMAIL : <?= $mail ?> </p>
        <a class="btn btn-primary" id="clientInformationLink" href="/views/clientInformationUpdate.php">modifier mes informations</a>
    </div>
    <?php
}
else
{ //          sinon on affiche le formulaire
    ?>
    <form action="newRegistration.php" method="POST">
        <div id="siteRegistration" class="form-group">
            <div class="identity">
                <div class="title">
                    <p>Merci de remplir le formulaire</p>
                </div>
                <div class="row col-lg-12 justify-content-center">
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">NOM:</label>
                        <input type="text" class="form-control" placeholder="Nom" id="lastname" name="lastname" value="<?= (isset($lastname)) ? $_POST['lastname'] : '' //sauvegarde les valeurs du post ?>">
                        <p><?= (empty($formError['lastname'])) ? '' : $formError['lastname'] //affichage des messages d'erreur ?></p>
                    </div>
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">PRENOM:</label>
                        <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname" value="<?= (isset($firstname)) ? $_POST['firstname'] : '' ?>">
                        <p><?= (empty($formError['firstname'])) ? '' : $formError['firstname'] ?></p>
                    </div>
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">DATE DE NAISSANCE:</label>
                        <input max="<?= date('Y-m-d') ?>" type="date" class="form-control"  id="birthdate" name="birthdate" value="<?= (isset($birthdate)) ? $_POST['birthdate'] : '' ?>">
                        <p><?= (empty($formError['birthdate'])) ? '' : $formError['birthdate'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">EMAIL:</label>
                        <input type="mail" class="form-control" placeholder="Email" id="mail" name="mail" value="<?= (isset($mail)) ? $_POST['mail'] : '' ?>">
                        <p><?= (empty($formError['mail'])) ? '' : $formError['mail'] ?></p>
                        <p><?= (empty($formError['existMail'])) ? '' : $formError['existMail'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="phone" class="col-sm-2 col-form-label">TELEPHONE:</label>
                        <input type="text" class="form-control" placeholder="Téléphone" id="phone" name="phone" value="<?= (isset($phone)) ? $_POST['phone'] : '' ?>">
                        <p><?= (empty($formError['phone'])) ? '' : $formError['phone'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="password" class="col-sm-6 col-form-label">MOT DE PASSE: </label>
                        <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" value="<?= (isset($password)) ? $_POST['password'] : '' ?>">
                        <p><?= (empty($formError['password'])) ? '' : $formError['password'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="confirmPassword" class="col-sm-6 col-form-label">CONFIRMER LE MOT DE PASSE:</label>
                        <input type="password" class="form-control" placeholder="confirmer mot de passe" id="confirmPassword" name="confirmPassword" value="<?= (isset($confirmPassword)) ? $_POST['confirmPassword'] : '' ?>">
                        <p><?= (empty($formError['confirmPassword'])) ? '' : $formError['confirmPassword'] ?></p>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="cguCheck" class="custom-control-input" id="customSwitch1" value= "1" >
                        <label class="custom-control-label" for="customSwitch1">j'ai lu et j'accepte les <a target="blank" href="CGU_CGV.php">Conditions générales d' utilisation et de vente</a></label>
                        <p><?= (empty($formError['cguCheck'])) ? '' : $formError['cguCheck'] ?></p>
                    </div>
                    <button type="submit" name="submit" class="btnValid btn-primary btn-lg justify-content-center">VALIDER LES INFORMATIONS</button>
                </div>
            </div>
        </div>
    </form>
    <?php
}
include '../footer.php';
?>