<?php
session_start();
include '../header.php';
include '../models/clientUser.php';
include '../controllers/eraseUserByAdminCtrl.php';
include 'administratorNavbar.php';
?>
<?php if ($success)
{ ?>
    <p>Le client à bien été supprimé</p>
<?php }
else
{ ?>
    <div class="alert alert-dismissible alert-danger">
        <h3>Vous êtes sur le point de SUPPRIMER le compte : " <?= $clients->lastname ?> <?= $clients->firstname ?> "</h3>
        <div class="row col-lg-12 justify-content-center"><a href="clientListView.php" class="alert-link alertButtonErasing btn btn-primary">ANNULER</a>  
        </div>
    </div>
    <div class="row eraseClient justify-content-center">
        <a type="button" class="btnValid btn-danger btn-lg justify-content-center" href="eraseUserByAdmin.php?action=erase&idUserDelete=<?= $clients->id ?>" >JE SUPPRIME CE COMPTE</a>
    </div>
<?php }
?>
<?php
include '../footer.php';
?>
