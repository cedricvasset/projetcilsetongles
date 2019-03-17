<?php
session_start();
include '../models/dataBase.php';
include '../models/clientUser.php';
include '../controllers/listClientCtrl.php';
include('../header.php');
?>  
<div class="row col-lg-12 justify-content-center">
<div class="navbarAdmin">
<a class="btn btn-secondary" id="" href="administratorView.php">FICHIER CLIENT <span class="sr-only">(current)</span></a>
<a class="btn btn-secondary" id="" href="">CREER UN RENDEZ-VOUS</a>
<a class="btn btn-secondary" id="presta" href="" >MES RENDEZ-VOUS</a>
<a class="btn btn-secondary" id="presta" href="" >MON STOCK</a>
<a class="btn btn-secondary" id="presta" href="" >COMPTABILITE</a>
</div>
    </div>
 <div class="row col-lg-12 listClientTab">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Age</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody >
                <?php
                foreach ($searchClientInfos as $info)
                {
                    ?>
                    <tr class="table-secondary">
                        <td><?= $info->lastname ?></td>
                        <td><?= $info->firstname ?></td>
                        <td><?= $info->birthdate ?></td>
                        <td><?= $info->age ?></td>
                        <td><?= $info->phone ?></td>
                        <td><?= $info->mail ?></td>
                        <td><a class="btn btn-success btn-lg" href="liste-patients.php?id=<?= $info->id ?>" >INFOS</a></td>
                        <td><a class="btn btn-info btn-lg" href="liste-patients.php?id=<?= $info->id ?>" >Modifier</a></td>
                        <td><a class="btn btn-danger btn-lg" href="liste-patients.php?id=<?= $info->id ?>" >Supprimer</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


<?php
include('../footer.php');
?>