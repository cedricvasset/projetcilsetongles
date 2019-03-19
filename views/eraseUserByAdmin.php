<?php
session_start();
include '../models/dataBase.php';
include '../models/clientUser.php';
include '../controllers/eraseUserByAdminCtrl.php';
include('../header.php');
include('administratorNavbar.php');
?>
<div class="alert alert-dismissible alert-danger">
  <h3>Vous êtes sur le point de SUPPRIMER le compte : " <?= $clients->lastname ?> <?= $clients->firstname ?> "</h3>
  <div class="row col-lg-12 justify-content-center"><a href="clientListView.php" class="alert-link alertButtonErasing btn btn-primary">ANNULER</a>  
</div>
  </div>
<div class="row eraseClient justify-content-center">
    <a type="button" class="btnValid btn-danger btn-lg justify-content-center" href="clientListView.php" >JE SUPPRIME CE COMPTE</a>
</div>
<?php
include('../footer.php');
?>
