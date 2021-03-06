<?php
session_start();
include '../header.php';
include '../models/clientUser.php';
include '../controllers/clientInformationUpdateByAdminCtrl.php';
include 'administratorNavbar.php';
?>
<h3>Modifier les informations</h3>
<div class="updateForm">
    <form action="clientInformationUpdateByAdmin.php?id=<?= $clients->id ?>" method="POST">
        <div id="clientInformationUpdate" class="form-group">
            <div class="identity">
                <div class="row col-lg-12 justify-content-center">
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">NOM:</label>
                        <!--                            pour que le texte saisi reste en memoire donne à la value le contenu du $_POST['lastname'] -->
                        <input type="text" class="form-control" placeholder="Nom" id="lastname" name="lastname" value="<?= $clients->lastname ?>">
                        <p><?= (empty($formError['lastname'])) ? '' : $formError['lastname'] ?></p>
                    </div>
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">PRENOM:</label>
                        <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname" value="<?= $clients->firstname ?>">
                        <p><?= (empty($formError['firstname'])) ? '' : $formError['firstname'] ?></p>
                    </div>
                    <div class="col-lg-4">
                        <label class="col-form-label" for="inputDefault">DATE de Naissance:</label>
                        <input max="<?= date('Y-m-d') ?>" type="date" class="form-control"  id="birthdate" name="birthdate" value="<?= $formatedDate ?>">
                        <p><?= (empty($formError['birthdate'])) ? '' : $formError['birthdate'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
                        <input type="mail" class="form-control" placeholder="Email" id="mail" name="mail" value="<?= $clients->mail ?>">
                        <p><?= (empty($formError['mail'])) ? '' : $formError['mail'] ?></p>
                        <p><?= (empty($formError['existMail'])) ? '' : $formError['existMail'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="phone" class="col-sm-2 col-form-label">Téléphone:</label>
                        <input type="text" class="form-control" placeholder="Téléphone" id="phone" name="phone" value="<?= $clients->phone ?>">
                        <p><?= (empty($formError['phone'])) ? '' : $formError['phone'] ?></p>
                    </div>
                    <button type="submit" name="submit" class="btnValid btn-primary btn-lg justify-content-center">VALIDER LES MODIFICATIONS</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include '../footer.php';
?>